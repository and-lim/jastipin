<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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

        $added_item = DB::table('items')
        ->select('*')
        ->where('trip_id', $id)
        ->get();
        return view('trip-draft', compact('edit_trip', 'added_item'));
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

    function addItem(Request $request){
        $rules = [
            'name' => 'required|min:5|max:25',
            'category' => 'gte:1',
            'description' => 'required|min:10|max:100',
            'price' => 'required|gte:1000|lte:10000000',
            'stock' => 'required|gte:1',
            'image' => 'required'
        ];

        $message = [
            'required' => "This field is required.",
            'category.gte' => "Please choose a category.",
            'name.min' => "Name must be between 5-25 characters.",
            'name.max' => "Name must be between 5-25 characters.",
            'description.min' => "Description must be between 10-100 characters.",
            'description.max' => "Description must be between 10-100 characters.",
            'price.gte' => "Price must be between Rp 1.000 and Rp 10.000.000.",
            'price.lte' => "Price must be between Rp 1.000 and Rp 10.000.000.",
            'stock.gte' => "Stock must be at least 1."
        ];

        $filename = $request->file('item_image')->getClientOriginalName();
        $generate_file = time().'_'.$filename;

        $path = $request->file('item_image')->storeAs('public/', $generate_file);

        $items = Item::create([
            'item_name' => $request->item_name,
            'item_category' => $request->item_category,
            'item_image' => $generate_file,
            'item_weight' => $request->item_weight,
            'item_stock' => $request->item_stock,
            'item_price' => $request->item_price,
            'item_display_price' => $request->item_display_price,
            'trip_id' => $request->trip_id,
        ]);
        return redirect('/trip-draft/' . $request->trip_id);
    }

    function removeItem(Request $request){
        $delete_item = DB::table('items')
        ->where('id', $request->id)
        ->delete();

        return back();
    }
    
}