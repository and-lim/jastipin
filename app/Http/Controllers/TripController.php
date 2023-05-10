<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    function makeTrip(Request $request)
    {
        $trips = Trip::create([
            'destination' => $request->destination,
            'origin' => $request->origin,
            'start_date' => $request->start_date,
            'arrival_date' => $request->arrival_date,
            'request' => $request->request_other,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);
        return redirect('/dashboard');
    }

    function viewDashboard(Request $request)
    {
        // view draft trip
        $draft_trip = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname')
            ->where('status', 'draft')
            ->get();

        $ongoing_trip = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname')
            ->where('status', 'ongoing')
            ->get();

        return view('dashboard', compact('draft_trip'));
    }

    function editTrip($id){

        $edit_trip = DB::table('trips')
        ->select('trips.*')
        ->where('id',$id)
        ->first();
        return view('trip-draft', compact('edit_trip'));
    }
    
    function updateTrip(Request $request){
        $update_trip = DB::table('trips')
        ->where('id', $request->id)
        ->update([
            'destination' => $request->destination,
            'origin' => $request->origin,
            'start_date' => $request->start_date,
            'arrival_date' => $request->arrival_date,
            'request' => $request->request_other,
            'description' => $request->description,
        ]);
        return redirect('/trip-draft/' . $request->id);
    }
}