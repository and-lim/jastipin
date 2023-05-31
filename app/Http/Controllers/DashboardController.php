<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Item;
use App\Models\User;
use App\Models\Wtb;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    function makeTrip(Request $request)
    {
        $check_npwp = User::find(auth()->user()->id);
        
        if(!$check_npwp->npwp){
            return back()->withErrors(['msg' => 'You need to fill your NPWP in Dashboard > Profile before you make a trip!']);
        }
        if($request->destination == $request->origin)
        {
            return back()->withErrors(['msg' => 'Destination and Origin can not be same']);
        }

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
            ->where('trips.user_id', auth()->user()->id)
            ->get();

        $ongoing_trip = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname')
            ->where('status', 'ongoing')
            ->where('trips.user_id', auth()->user()->id)
            ->get();

        $item_in_trip = DB::table('items')
        ->join('trips', 'items.trip_id', 'trips.id')
        ->select('items.*')
        ->where('trips.user_id', auth()->user()->id)
        ->get();

        $wtb_item = DB::table('wtbs')
        ->join('users', 'wtbs.user_id', 'users.id')
        ->select('wtbs.*')
        ->where('wtb_status', 'published')
        ->get();

        $city = DB::table('cities')
        ->select('*')
        ->get();

        $user_profile = DB::table('users')
        ->select('*')
        ->where('id', auth()->user()->id)
        ->first();
        
        
        $countries = DB::table('countries')
        ->select('countries.name')
        ->where('name', '<>', 'Indonesia');
        
        $origins = $countries->get();

        $destinations = DB::table('cities')
        ->select('cities.name')
        ->union($countries)
        ->get();

        $home = DB::table('cities')
        ->select('name')
        ->get();

        $ongoing_transaction = DB::table('transactions')
        ->join('trips', 'transactions.trip_id', 'trips.id')
        ->join('users', 'transactions.user_id','users.id')
        ->join('shipping_types', 'transactions.shipping_type_id', 'shipping_types.id')
        ->select('transactions.*', 'trips.destination', 'trips.origin', 'users.address', 'users.phone_number', 'shipping_types.shipping_name', 'shipping_types.shipping_price')
        ->where('transactions.user_id', auth()->user()->id)
        ->where('transaction_status', 'ongoing')
        ->get();

        $transaction_detail_item = [];
        $transaction_detail_request = [];
        foreach($ongoing_transaction as $header){
            $id_transaction = $header->id;
            $detail_item =  DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('items', 'transaction_details.item_id', 'items.id')
            ->select('transaction_details.*', 'items.item_name', 'items.item_display_price')
            ->where('transaction_details.transaction_id', $id_transaction)
            ->get();

            $transaction_detail_item = Arr::add($transaction_detail_item, $id_transaction , $detail_item );

            $detail_request = DB::table('transaction_details')
            ->join('transactions', 'transaction_details.transaction_id', 'transactions.id')
            ->join('trips', 'transactions.trip_id', 'trips.id')
            ->join('request_items', 'transaction_details.request_id', 'request_items.id')
            ->select('transaction_details.*', 'request_items.request_name', 'request_items.request_price')
            ->where('transaction_details.transaction_id', $id_transaction)
            ->get();

            $transaction_detail_request = Arr::add($transaction_detail_request, $id_transaction, $detail_request);
            
            
        }


        return view('dashboard', compact('home','origins','destinations','city','draft_trip', 'ongoing_trip', 'item_in_trip','wtb_item','user_profile', 'ongoing_transaction', 'transaction_detail_item', 'transaction_detail_request'));
    }
    
    function editTrip($id){

        $countries = DB::table('countries')
        ->select('countries.name')
        ->where('name', '<>', 'Indonesia');
        
        $origins = $countries->get();

        $destinations = DB::table('cities')
        ->select('cities.name')
        ->union($countries)
        ->get();

        $home = DB::table('cities')
        ->select('name')
        ->get();

        $edit_trip = DB::table('trips')
        ->select('trips.*', 'luggage_limit.weight')
        ->leftJoinSub(DB::table('items')->select(DB::raw('items.trip_id, SUM(items.item_weight * items.item_stock) as weight'))->where('items.trip_id',$id), 'luggage_limit', 'trips.id', 'luggage_limit.trip_id')
        ->where('id',$id)
        ->first();

        $added_item = DB::table('items')
        ->select('*')
        ->where('trip_id', $id)
        ->get();
        return view('trip-draft', compact('destinations','home','edit_trip', 'added_item'));
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
            'luggage' => $request->luggage,
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
            'item_description' => $request->item_description,
            'trip_id' => $request->trip_id,
        ]);

        $kurs = 15000;
        $FOB = $kurs * 500;
        $pabean = $items->item_display_price - $FOB;
        if ($pabean > $FOB) {
            $ppn = $items->item_display_price * 0.1;
            $nilai_pabean = $pabean - $FOB;
            $add_ppn_pabean = DB::table('items')
                ->where('items.id', $request->item_id)
                ->update([
                    'item_price_ppn' => $ppn,
                    'item_price_pabean' => $nilai_pabean
                ]);
        }
        return redirect('/trip-draft/' . $request->trip_id);
    }

    function removeItem(Request $request){
        $delete_item = DB::table('items')
        ->where('id', $request->id)
        ->delete();

        return back();
    }

    function publishTrip(Request $request){

        $total_price = DB::table('items')
        ->select(DB::raw('SUM(item_price * item_stock) AS total_price_trip'))
        ->where('items.trip_id', $request->trip_id)
        ->first();

        $total = $total_price->total_price_trip;
        $kurs = 15000;
        $fob = 500 * $kurs;
        $tax = 0;

        if($total > $fob ){
            $pabean = ($total - $fob);
            $beamasuk = 0.1 * $pabean;
            $nilaiimpor = $pabean + $beamasuk;
            $ppn =  0.11 * $nilaiimpor;
            $pph =  0.1 * $nilaiimpor;

            $tax = $beamasuk + $ppn + $pph;
        }


        $publish_trip = DB::table('trips')
        ->where('id', $request->trip_id)
        ->update([
            'status' => 'ongoing',
            'tax' => $tax,
            'total_price' => $total
        ]);
        return redirect('/dashboard');
    }

    function addWtbItem(Request $request){

        
        $filename = $request->file('wtb_image')->getClientOriginalName();
        $generate_file = time().'_'.$filename;

        $path = $request->file('wtb_image')->storeAs('public/', $generate_file);

        $add_wtb = Wtb::create([
            'wtb_name' => $request->wtb_name,
            'wtb_location' => $request->wtb_location,
            'wtb_price' => $request->wtb_price,
            'wtb_amount' => $request->wtb_amount,
            'wtb_weight' => $request->wtb_weight,
            'wtb_image' => $generate_file,
            'wtb_description' => $request->wtb_description,
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/dashboard');
    }

    function removeWtbItem(Request $request){
        $delete_item = DB::table('Wtbs')
        ->where('id', $request->id)
        ->update([
            'wtb_status' => 'deleted'
        ]);

        return back();
    }

    function updateProfile(Request $request)
    {
        $search_city = DB::table('cities')
        ->select('*')
        ->where('name', $request->city)
        ->first();

        if(!$search_city) return back()->withErrors(['msg' => 'The city name is not a valid Indonesian city']);

        if($request->file('avatar')){

            $filename = $request->file('avatar')->getClientOriginalName();
            $generate_file = time().'_'.$filename;
    
            $path = $request->file('avatar')->storeAs('public/', $generate_file);
            $update_profile = DB::table('users')
        ->where('id', $request->id )
        ->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'city' => $request->city,
            'NPWP' => $request->NPWP,
            'password' => Hash::make($request->password),
            'avatar' => $generate_file,
            'address' => $request->address
        ]);
        }else{

            $update_profile = DB::table('users')
            ->where('id', $request->id )
            ->update([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'NPWP' => $request->NPWP,
                'password' => Hash::make($request->password),
                'address' => $request->address
            ]);
        }

        return redirect('/dashboard');
    }
    
}