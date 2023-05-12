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

        return view('trip-detail' , compact('trips', 'items'));
    }
}
