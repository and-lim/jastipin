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
            ->select('*')
            ->where('trip_id', $id)
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
}
