<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    function register()
    {
        return view('register');
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

    //     $transactions = DB::table('transactions')
    //     ->join('users','transactions.user_id', 'users.id')
    //     ->leftJoinSub(DB::table('carts')->join('items', 'carts.item_id', 'items.id')->join('trips','items.trip_id', 'trips.id')->select('carts.item_id','trips.user_id'), 'cart_item', 'cart_item.item_id', 'items.id')
    //     ->leftJoinSub(DB::table('carts')->join('request_items', 'carts.request_id', 'request_items.id')->join('trips','request_items.trip_id', 'trips.id')->select('carts.request_id','trips.user_id'), 'cart_request', 'cart_request.request_id', 'request_items.id')
    //    ->leftJoinSub(DB::table('carts')->join('items', 'carts.item_id', 'items.id')->where('items.trip_id', auth()->user()->id), 'cart', 'cart.item_id', 'items.id')
    //     ->leftJoinSub(DB::table('carts')->join('request', 'carts.item_id', 'request.id')->where('request.trip_id', auth()->user()->id), 'cart', 'cart.request_id', 'request.id')
    //     ->select('users.fullname', 'users.address', 'users.phone_number', 'transactions.*')
    //     ->where('cart_item.user_id',auth()->user()->id)
    //     ->where('cart_request.user_id',auth()->user()->id)
    //     ->get();



        return view('order', compact('request_list'));
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
}
