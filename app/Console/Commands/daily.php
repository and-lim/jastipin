<?php

namespace App\Console\Commands;

use App\Models\TransactionList;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class daily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hold:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Hold Transaction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now()->setTimezone('Asia/Jakarta');


        $auto_hold = DB::table('shippings')
            ->join('transactions', 'shippings.transaction_id', 'transactions.id')
            ->select('shippings.*')
            ->where('shippings.shipping_status', 'waiting receive')
            ->whereDate('shippings.ship_time_limit', '=', $now->format('Y-m-d'))
            ->get();
        // error_log('ini daily');

        if ($auto_hold) {

            foreach ($auto_hold as $auto) {
                $change_shipping_status = DB::table('shippings')
                    ->where('id', $auto->id)
                    ->update([
                        'shipping_status' => 'hold'
                    ]);

                $change_transaction_status = DB::table('transactions')
                    ->where('id', $auto->transaction_id)
                    ->update([
                        'transaction_status' => 'hold'
                    ]);
            }
        }

        $deadline_not_received = DB::table('shippings')
            ->join('transactions', 'shippings.transaction_id', 'transactions.id')
            ->select('shippings.*')
            ->where('shippings.shipping_status', 'hold')
            ->where('transactions.transaction_status', 'hold')
            ->whereDate('shippings.ship_time_limit', '=', $now->addDay(-2)->format('Y-m-d'))
            ->get();

        if ($deadline_not_received) {
            foreach ($deadline_not_received as $not_received) {
                $change_shipping_status = DB::table('shippings')
                    ->where('id', $auto_hold->id)
                    ->update([
                        'shipping_status' => 'finished'
                    ]);
                $change_transaction_status = DB::table('transactions')
                    ->where('id', $auto_hold->transaction_id)
                    ->update([
                        'transaction_status' => 'finished'
                    ]);

                $get_balance_transaction = TransactionList::where('transaction_id', $not_received->transaction_id)->first();
                $refund_buyer = User::find(auth()->user()->id);
                $refund_buyer->balance = $refund_buyer->balance + $get_balance_transaction->balance_to_buyer;
                $refund_buyer->save();

                $get_seller = DB::table('transactions')
                    ->leftJoin('trips', 'transactions.trip_id', 'trips.id')
                    ->select('trips.user_id', 'transactions.trip_id','transactions.user_id as buyer_id')
                    ->where('transactions.id', $not_received->transaction_id)
                    ->first();

                $balance_to_seller = User::find($get_seller->user_id);
                // dd($balance_to_seller);
                $balance_to_seller->balance = $balance_to_seller->balance + $get_balance_transaction->hold_balance;
                $balance_to_seller->save();

                $status_trip = Trip::find($get_seller->trip_id);
                $status_trip->status = 'finished';
                $status_trip->save();

                $delete_cart = DB::table('carts')
                    ->where('carts.user_id',$get_seller->buyer_id)
                    ->where('trip_id', $get_seller->trip_id)
                    ->where('cart_status', 'paid')
                    ->delete();

                $reduce_admin_balance = User::where('is_admin',true);
                $reduce_admin_balance->balance = $reduce_admin_balance->balance - ($get_balance_transaction->hold_balance + $get_balance_transaction->balance_to_buyer);
                $reduce_admin_balance->save();

            }
        }
    }
}
