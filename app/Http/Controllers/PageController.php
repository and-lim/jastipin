<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\RequestItem;
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
        $trip_list = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname', 'users.avatar')
            ->where('trips.status', 'ongoing')
            ->get();

        $items = DB::table('items')
            ->join('trips', 'items.trip_id', 'trips.id')
            ->select('items.*')
            ->get();

        return view('trip', compact('trip_list', 'items'));
    }

    function viewTripDetail($id)
    {

        $trips = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname', 'users.avatar')
            ->where('trips.id', $id)
            ->first();

        $items = DB::table('items')
            ->leftJoinSub(DB::table('carts')->select('carts.item_id', 'carts.cart_item_quantity')->where('carts.user_id', auth()->user()->id),
            'cart', 'cart.item_id', 'items.id')
            ->select('items.*', 'cart.cart_item_quantity')
            ->where('items.trip_id', $id)
            ->get();
        return view('trip-detail', compact('trips', 'items'));
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
        ->select('request_items.*', 'users.fullname')
        ->where('request_items.request_status', 'waiting approval')
        ->where('trips.user_id', auth()->user()->id)
        ->get();

        $order_list_header = DB::table('transactions')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->join('users as travelers', 'trips.user_id', 'travelers.id')
        ->join('users as buyers', 'transactions.user_id', 'buyers.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('transactions.*', 'trips.destination', 'trips.origin', 'buyers.fullname', 'buyers.address', 'buyers.phone_number', 'shipping_types.shipping_name')
        ->where('trips.user_id', auth()->user()->id)
        ->get();


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


        return view('order', compact('request_list', 'order_list_header', 'order_detail_item', 'order_detail_request'));
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
        $change_status_shipping = DB::table('transaction')
        ->where('id', $request->transaction_id)
        ->update([
            'transaction_status' => 'shipping'
        ]);

        $shipping = DB::table('transactions')
        ->join('trips', 'transactions.trips_id', 'trips.id')
        ->join('users as buyer', 'transaction.user_id', 'users.id')
        ->join('users as traveller', 'transaction.user_id', 'users.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('traveller.fullname', 'traveller.address', 'traveller.phone_number', 'shipping_types.shipping_name')
        ->where('traveler.id', 'trips.user_id')
        ->get();

        $item_shipping = DB::table('transaction_details')
        ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
        ->join('items', 'transaction_details.item_id', 'items.id')
        ->select('transaction_details.*', 'items.item_name')
        ->where('transactions.id', $request->transaction_id)
        ->get();

        $request_shipping = DB::table('transaction_details')
        ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
        ->join('request_items', 'transaction_detail.request_id', 'request_items.id')
        ->select('transaction_details.*', 'request_items.request_name')
        ->where('transactions.id', $request->transaction_id)
        ->get();

        return view('order', compact('shipping', 'item_shipping'));
    }
}
