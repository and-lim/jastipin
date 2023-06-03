<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\RequestItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function register()
    {
        $city = DB::table('cities')
        ->select('*')
        ->get();
        return view('register', compact('city'));
    }
    function login()
    {
        return view('login');
    }

    function viewTripList()
    {
        $selected_category = '';
        $destination = '';
        $origin = '';
        $datenya = '';
        $now = Carbon::now();

        $trip_list = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname', 'users.avatar')
            ->where('trips.status', 'ongoing')
            ->where('trips.start_date', '>', $now)
            ->get();

        $items = DB::table('items')
            ->join('trips', 'items.trip_id', 'trips.id')
            ->select('items.*')
            ->get();

        return view('trip', compact('trip_list', 'items', 'selected_category', 'destination', 'origin', 'datenya'));
    }

    function filter_category(Request $request)
    {
        $selected_category = $request->category;
        $now = Carbon::now();

        $trip_list = DB::table('trips')
        ->join('users', 'trips.user_id','users.id')
        ->leftJoinSub(DB::table('items')->select(DB::raw('items.trip_id, COUNT(*) AS jumlah '))->where('items.item_category', $request->category)->groupBy('items.trip_id'), 'filter', 'filter.trip_id', 'trips.id')
        ->select('trips.*', 'users.fullname', 'users.avatar')
        ->where('filter.jumlah', '<>', 'null')
        ->where('trips.status', 'ongoing')
        ->where('trips.start_date', '>', $now)
        ->get();

        $items = DB::table('items')
        ->join('trips', 'items.trip_id', 'trips.id')
        ->select('items.*')
        ->get();
        
        return view('trip', compact('trip_list', 'items', 'selected_category'));
    }

    function search_trip(Request $request){
        $now = Carbon::now();
        $selected_category = '';
        $destination = $request->destination;
        $origin = $request->origin;
        $datenya = $request->datenya;

        $trip_list = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname', 'users.avatar')
            ->where('trips.destination', $request->destination)
            ->where('trips.origin', $request->origin)
            ->where('trips.start_date', $request->datenya)
            ->where('trips.status', 'ongoing')
            ->where('trips.start_date', '>', $now)
            ->get();

        $items = DB::table('items')
            ->join('trips', 'items.trip_id', 'trips.id')
            ->select('items.*')
            ->get();

        return view('trip', compact('trip_list', 'items','selected_category', 'destination', 'origin', 'datenya'));
    }

    function viewTripDetail($id)
    {
        $now = Carbon::now();

        $trips = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname', 'users.avatar')
            ->where('trips.id', $id)
            ->first();
        
        $can_buy = $trips->start_date > $now;

        $items = DB::table('items')
            ->leftJoinSub(DB::table('carts')->select('carts.item_id', 'carts.cart_item_quantity')->where('carts.user_id', auth()->user()->id),
            'cart', 'cart.item_id', 'items.id')
            ->select('items.*', 'cart.cart_item_quantity')
            ->where('items.trip_id', $id)
            ->get();
        return view('trip-detail', compact('trips', 'items','can_buy'));
    }

    function viewWtbList()
    {
        $wtb_item = DB::table('wtbs')
            ->join('users', 'wtbs.user_id', 'users.id')
            ->select('wtbs.*')
            ->where('wtb_status', 'published')
            ->get();

        return view('item', compact('wtb_item'));
    }

    function viewWtbDetail($id)
    {
        $wtb_detail = DB::table('wtbs')
            ->select('*')
            ->where('id', $id)
            ->first();

        return view('item-detail', compact('wtb_detail'));
    }

    function viewOrder()
    {

        $request_list = DB::table('request_items')
        ->join('users', 'request_items.requester_id', 'users.id')
        ->join('trips', 'request_items.trip_id', 'trips.id')
        ->select('request_items.*', 'users.fullname', 'trips.start_date')
        ->where('request_items.request_status', 'waiting approval')
        ->where('trips.user_id', auth()->user()->id)
        ->get();

        $interval_date = DateInterval::createFromDateString('2 day');
        // dd($interval_date);
        foreach($request_list as $request){

            $request->limit = new Carbon($request->created_at);
            $request->limit = $request->limit->addDay(2);
            
            if($request->limit > $request->start_date){

                $request->limit =  new Carbon($request->start_date);
            }
            
            $request->approvable = Carbon::now() < $request->limit;
            $request->limit = $request->limit->toDayDateTimeString();

        }
        
        $order_list_header = DB::table('transactions')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->join('users as travelers', 'trips.user_id', 'travelers.id')
        ->join('users as buyers', 'transactions.user_id', 'buyers.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('transactions.*', 'trips.destination', 'trips.origin', 'buyers.fullname', 'buyers.address', 'buyers.phone_number', 'shipping_types.shipping_name')
        ->where('trips.user_id', auth()->user()->id)
        ->where('transactions.transaction_status', 'ongoing')
        ->get();

        // dd($order_list_header);

        $order_detail_item = [];
        $order_detail_request = [];
        foreach($order_list_header as $header){
            $id_transaction = $header->id;
            $detail_item =  DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('items', 'transaction_details.item_id', 'items.id')
            ->select('transaction_details.*', 'items.item_name', 'items.item_display_price')
            ->where('transaction_details.transaction_id', $id_transaction)
            ->get();

            $order_detail_item = Arr::add($order_detail_item, $id_transaction , $detail_item );

            $detail_request = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('trips', 'transactions.trip_id', 'trips.id')
            ->join('request_items', 'transaction_details.request_id', 'request_items.id')
            ->select('transaction_details.*', 'request_items.request_name', 'request_items.request_price')
            ->where('transaction_details.transaction_id', $id_transaction)
            ->get();

            $order_detail_request = Arr::add($order_detail_request, $id_transaction, $detail_request);
            
            $shippable = DB::table('transaction_details')
            ->select(DB::raw('COUNT(*) as jumlah'))
            ->where('item_status', 'buying')
            ->where('transaction_id', $id_transaction)
            ->first();

            if($shippable->jumlah > 0){

                $header->shippable = 0;  
            }else{
                $header->shippable = 1;
            }
        }
        // dd($order_list_header);

        $shipping_list = DB::table('shippings')
        ->join('transactions', 'shippings.transaction_id', 'transactions.id')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->join('users as travelers', 'trips.user_id', 'travelers.id')
        ->join('users as buyers', 'transactions.user_id', 'buyers.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('shippings.*','transactions.shipping_trip_price','trips.arrival_date', 'trips.destination', 'trips.origin', 'buyers.fullname', 'buyers.address', 'buyers.phone_number', 'shipping_types.shipping_name')
        ->where('trips.user_id', auth()->user()->id)
        ->where('transactions.transaction_status', 'shipping')
        ->where('shippings.shipping_status', 'waiting_receipt')
        ->get();

        $shipping_detail_item = [];
        $shipping_detail_request = [];

        foreach($shipping_list as $shipping){
            $shipping_list_id = $shipping->transaction_id;

            $item_shipping = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('items', 'transaction_details.item_id', 'items.id')
            ->select('transaction_details.*', 'items.item_name', 'items.item_image')
            ->where('transactions.id', $shipping_list_id)
            ->where('transaction_details.item_status', 'bought')
            ->get();

            $shipping_detail_item = Arr::add($shipping_detail_item, $shipping_list_id , $item_shipping );

            $request_shipping = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('request_items', 'transaction_details.request_id', 'request_items.id')
            ->select('transaction_details.*', 'request_items.request_name','request_items.request_image')
            ->where('transactions.id', $shipping_list_id)
            ->where('transaction_details.item_status', 'bought')
            ->get();

            $shipping_detail_request = Arr::add($shipping_detail_request, $shipping_list_id , $request_shipping );
        }


        return view('order', compact('request_list', 'order_list_header', 'order_detail_item', 'order_detail_request', 'shipping_list', 'shipping_detail_item', 'shipping_detail_request'));
    }

    function autoCancel(Schedule $schedule): void{
        $schedule->call(function(){
            $now = Carbon::now();

            $item_ship = DB::table('transaction_details')
            ->leftJoin('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->leftJoin('trips','transactions.trip_id', 'trips.id')
            ->leftJoin('shippings', 'shippings.transaction_id', 'transactions.id')
            ->where('shippings.ship_time_limit', '<' , $now)
            ->update([
                'transaction_details.item_status' => 'cancelled',
                'transactions.transaction_status' => 'finished'
            ]);

            $get_hold_balance = DB::table('transaction_lists')
            ->leftJoin('transactions', 'transaction_lists.transaction_id', 'transactions.id')
            ->leftJoin('shippings', 'shippings.transaction_id', 'transactions.id')
            ->select('transactions.user_id','transaction_lists.hold_balance')
            ->where('shippings.ship_time_limit', '<' , $now)
            ->get();

            foreach($get_hold_balance as $hold_balance){
                $user_balance = User::find($hold_balance->user_id);
                $user_balance->balance = $user_balance->balance + $hold_balance->hold_balance;
                $user_balance->save();
            }

        })->daily();
    }

    function acceptRequest(Request $request)
    {
        $accept_request = DB::table('request_items')
        ->where('id', $request->request_id)
        ->update([
            'request_status' => 'Approved'
        ]);

        return back();
    }
    function rejectRequest(Request $request)
    {
        $delete_cart = DB::table('carts')
        ->where('request_id', $request->request_id)
        ->delete();
        $reject_request = DB::table('request_items')
        ->where('id', $request->request_id)
        ->delete();


        return back();
    }

    function itemBought (Request $request)
    {
        $check_list = DB::table('transaction_details')
        ->where('item_id', $request->item_id)
        ->update([
            'item_status' => 'bought'
        ]);

        return back();
    }

    function cancelBuyItem(Request $request)
    {
        $item_cancel = Item::find($request->item_id);
        $cancel_buy = DB::table('transaction_details')
        ->join('items', 'transaction_details.item_id', 'items.id')
        ->where('item_id', $request->item_id)
        ->update([
            'item_status' => 'cancelled',
            'cancel_reason' => $request->reason
        ]);

        // $transaction_list_admin = DB::table('')

        return back()->withErrors(['msg' => $item_cancel->item_name . ' has been cancelled!']);
    }

    function requestBought (Request $request)
    {
        $check_list = DB::table('transaction_details')
        ->where('request_id', $request->request_id)
        ->update([
            'item_status' => 'bought'
        ]);

        return back();
    }
    function cancelBuyRequest(Request $request)
    {
        $request_cancel = RequestItem::find($request->request_id);
        $cancel_buy = DB::table('transaction_details')
        ->join('request_items', 'transaction_details.request_id', 'request_items.id')
        ->where('request_id', $request->request_id)
        ->update([
            'item_status' => 'cancelled',
            'cancel_reason' => $request->reason
        ]);

        return back()->withErrors(['msg' => $request_cancel->request_name . ' has been cancelled!']);
    }

    function shipping(Request $request)
    {
        $arrival_trip = DB::table('transactions')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->select('trips.arrival_date')
        ->where('transactions.id', $request->transaction_id)
        ->first();

        $time_limit = new Carbon($arrival_trip->arrival_date);
        $time_limit = $time_limit->addDay(2);
        
        // $time_limit = $time_limit->toDayDateTimeString();

        // dd($time_limit);
        $change_status_shipping = DB::table('transactions')
        ->where('id', $request->transaction_id)
        ->update([
            'transaction_status' => 'shipping'
        ]);

        $create_shipping = Shipping::create([
            'transaction_id' => $request->transaction_id,
            'ship_time_limit' => $time_limit
        ]);


        

        return back();
    }

    function send(Request $request)
    {
        
        $shipping = DB::table('shippings')
        ->join('transactions', 'shippings.transaction_id', 'transactions.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('shippings.ship_time_limit','shipping_types.shipping_name')
        ->where('transactions.id', $request->transaction_id)
        ->where('shippings.id', $request->shipping_id)
        ->first();

        $user_acc_limit = Carbon::now();

        if($shipping->shipping_name == 'regular'){
            $user_acc_limit = $user_acc_limit->addDay(7);
        }else{
            $user_acc_limit = $user_acc_limit->addDay(5);
        }
        // dd($user_acc_limit);

        $change_status_shipped = DB::table('transactions')
        ->where('id', $request->shipping_transaction_id)
        ->update([
            'transaction_status' => 'shipped'
        ]);

        $send= DB::table('shippings')
        ->update([
            'shipping_receipt' => $request->shipping_receipt,
            'ship_time_limit' => $user_acc_limit,
            'shipping_status' => 'waiting receive'
        ]);

        return back();
    }

    function transaction_list(){
        $transaction_header = DB::table('transaction_lists')
        ->join('transactions', 'transaction_lists.transaction_id', 'transactions.id')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->join('users as travelers', 'trips.user_id', 'travelers.id')
        ->join('users as buyers', 'transactions.user_id', 'buyers.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('transaction_lists.hold_balance','transaction_lists.balance_to_buyer','transactions.*', 'trips.destination', 'trips.origin', 'travelers.fullname as traveler_fullname', 'buyers.fullname as buyer_fullname', 'buyers.address', 'buyers.phone_number', 'shipping_types.shipping_name')
        ->get();

        // dd($transaction_header);
        $item_list = [];
        $request_list = [];

        foreach($transaction_header as $transaction )
        {
            $item_transaction = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('items', 'transaction_details.item_id', 'items.id')
            ->select('transaction_details.*', 'items.item_name', 'items.item_display_price')
            ->where('transaction_details.transaction_id', $transaction->id)
            ->get();

            $item_list = Arr::add($item_list , $transaction->id , $item_transaction );

            $request_transaction = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('trips', 'transactions.trip_id', 'trips.id')
            ->join('request_items', 'transaction_details.request_id', 'request_items.id')
            ->select('transaction_details.*', 'request_items.request_name', 'request_items.request_price')
            ->where('transaction_details.transaction_id', $transaction->id)
            ->get();

            $request_list = Arr::add($request_list , $transaction->id , $request_transaction );

        }
        return view('transaction-list', compact('transaction_header', 'item_list', 'request_list'));
    }
}
