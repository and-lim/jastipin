<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class autoCancel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Cancel Transaction If Not Shipped';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now()->setTimezone('Asia/Jakarta');

        $item_ship = DB::table('transaction_details')
            ->leftJoin('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->leftJoin('trips', 'transactions.trip_id', 'trips.id')
            ->leftJoin('shippings', 'shippings.transaction_id', 'transactions.id')
            ->where('shippings.shipping_status', 'waiting_receipt')
            ->where('shippings.ship_time_limit', '=', $now->format('Y-m-d'))
            ->update([
                'transaction_details.item_status' => 'cancelled',
                'transactions.transaction_status' => 'cancelled',
                'shippings.shipping_status' => 'cancelled'
            ]);
            
            
            $get_hold_balance = DB::table('transaction_lists')
            ->leftJoin('transactions', 'transaction_lists.transaction_id', 'transactions.id')
            ->leftJoin('trips', 'transactions.trip_id','trips.id')
            ->leftJoin('shippings', 'shippings.transaction_id', 'transactions.id')
            ->select('transactions.user_id','transactions.trip_id', 'transaction_lists.hold_balance','transaction_lists.balance_to_buyer')
            ->where('transactions.transaction_status', '<>', 'hold')
            ->where('shippings.ship_time_limit', '=', $now->format('Y-m-d'))
            ->get();
            
            foreach ($get_hold_balance as $hold_balance) {
                $user_balance = User::find($hold_balance->user_id);
                $user_balance->balance = $user_balance->balance + ($hold_balance->hold_balance + $hold_balance->balance_to_buyer);
                $user_balance->save();

                $reduce_admin_balance = User::where('is_admin',true);
                $reduce_admin_balance->balance = $reduce_admin_balance->balance - ($hold_balance->hold_balance + $hold_balance->balance_to_buyer);
                $reduce_admin_balance->save();
                // error_log('ini cancel');

                $delete_cart = DB::table('carts')
                    ->where('carts.user_id', $hold_balance->user_id)
                    ->where('trip_id', $hold_balance->trip_id)
                    ->where('cart_status', 'paid')
                    ->delete();
        }

    }
}
