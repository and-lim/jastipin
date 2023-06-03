<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\MoneyFlow;
use App\Models\RequestItem;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TransactionList;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    function addRequestItem(Request $request)
    {
        // $find_another_trip = DB::table('carts')
        // ->join('items', 'carts.item_id', 'items.id')
        // ->join('request_items', 'carts.request_id', 'request_items.id')
        // ->where('items.trip_id', '<>', $request->trip_id)
        // ->where('request_items.trip_id', '<>', $request->trip_id)
        // ->first();

        // if ($find_another_trip) {
        //     return back()->withErrors(['another_trip' => 'There are some items in your cart from another trip, please checkout your cart first!']);
        // } else {

            $kurs = 15000;
            $fob = 500 * $kurs;
            $tax = 0;
    
                $pabean = $request->request_price;
                $beamasuk = 0.1 * $pabean;
                $nilaiimpor = $pabean + $beamasuk;
                $ppn =  0.11 * $nilaiimpor;
                $pph =  0.1 * $nilaiimpor;
    
                $tax = $beamasuk + $ppn + $pph;


        $filename = $request->file('request_image')->getClientOriginalName();
        $generate_file = time() . '_' . $filename;

        $path = $request->file('request_image')->storeAs('public/', $generate_file);



        $request_items = RequestItem::create([
            'requester_id' => auth()->user()->id,
            'request_name' => $request->request_name,
            'request_category' => $request->request_category,
            'request_brand' => $request->request_brand,
            'request_image' => $generate_file,
            'request_description' => $request->request_description,
            'request_price' => $request->request_price,
            'request_quantity' => $request->request_quantity,
            'request_weight' => $request->request_weight,
            'request_tax' => $tax,
            'trip_id' => $request->trip_id
        ]);

        $check_price = DB::table('request_items')
            ->where('request_items.id', $request_items->id)
            ->first();

        $kurs = 15000;
        $FOB = $kurs * 500;
        $pabean = $check_price->request_price - $FOB;
        if ($pabean > $FOB) {
            $ppn = $check_price->request_price * 0.1;
            $nilai_pabean = $pabean - $FOB;

            $add_ppn_pabean = DB::table('request_items')
                ->where('request_items.id', $request_items->id)
                ->update([
                    'request_price_ppn' => $ppn,
                    'request_price_pabean' => $nilai_pabean
                ]);
        }

        $cart_request = Cart::create([
            'user_id' => auth()->user()->id,
            'request_id' => $request_items->id,
            'trip_id' => $request_items->trip_id,
            'cart_item_quantity' => $request_items->request_quantity,
        ]);



        return redirect('/trip-detail/' . $request->trip_id);
        // }
        // return back();
    }

    function addToCart(Request $request)
    {

        $find = Cart::where('user_id', auth()->user()->id)->where('item_id', $request->item_id)->first();
        // $find_another_trip = DB::table('carts')
        //     ->join('items', 'carts.item_id', 'items.id')
        //     ->join('request_items', 'carts.request_id', 'request_items.id')
        //     ->where('items.trip_id', '<>', $request->trip_id)
        //     ->where('request_items.trip_id', '<>', $request->trip_id)
        //     ->first();

        // if ($find_another_trip) {
        //     return back()->withErrors(['another_trip' => 'There are some items in your cart from another trip, please checkout your cart first!']);
        // } else {

        if ($find) {
            $find->cart_item_quantity = $request->item_quantity;
            $find->save();
        } else {

            $add_cart = Cart::create([
                'user_id' => auth()->user()->id,
                'item_id' => $request->item_id,
                'trip_id' => $request->trip_id,
                'cart_item_quantity' => $request->item_quantity
            ]);
        }
        // }


        return back();
    }

    public static function vincentyGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
      {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);
      
        $lonDelta = $lonTo - $lonFrom;
        $a = pow(cos($latTo) * sin($lonDelta), 2) +
          pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);
      
        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
      }

    function viewCart()
    {
        $check_status = DB::table('carts')
            ->join('request_items', 'carts.request_id', 'request_items.id')
            ->select('request_items.request_status')
            ->where('request_items.request_status', 'waiting approval')
            ->where('carts.user_id', auth()->user()->id)
            ->first();

        $rejected = DB::table('carts')
            ->join('request_items', 'carts.request_id', 'request_items.id')
            ->join('trips', 'request_items.trip_id', 'trips.id')
            ->select('request_items.request_status', 'trips.destination', 'trips.origin')
            ->where('request_items.request_status', 'rejected')
            ->where('carts.user_id', auth()->user()->id)
            ->first();
        

        $cart_trip = DB::table('carts')
            ->leftJoin('trips', 'carts.trip_id', 'trips.id')
            ->leftJoin('items', 'carts.item_id', 'items.id')
            ->leftJoin('request_items', 'carts.request_id', 'request_items.id')
            ->select(DB::raw('SUM(carts.cart_item_quantity*request_items.request_tax) as total_request_tax'),DB::raw('SUM(carts.cart_item_quantity*items.item_price) as total_price_item'),'carts.trip_id', 'trips.*')
            ->where('carts.user_id', auth()->user()->id)
            ->where('carts.cart_status', 'unpaid')
            ->groupBy('carts.trip_id')
            ->get();

        // dd($cart_trip);

        $array_trip = [];
        $longlatbuyer = DB::table('users')
        ->join('cities', 'users.city', 'cities.name')
        ->select('cities.longitude', 'cities.latitude')
        ->where('users.id', auth()->user()->id)
        ->first();

        // dd($cart_trip);
        foreach ($cart_trip as $trip) {
            
            
            $trip->tax = (int) (($trip->total_price_item / $trip->total_price) * $trip->tax) + $trip->total_request_tax;

            // dd($trip->tax, $trip->id);
            $longlattraveler = DB::table('users')
            ->join('cities', 'users.city', 'cities.name')
            ->select('cities.longitude', 'cities.latitude')
            ->where('users.id', $trip->user_id)
            ->first();

            $trip->distance = $this->vincentyGreatCircleDistance($longlatbuyer->latitude, $longlatbuyer->longitude, $longlattraveler->latitude, $longlattraveler->longitude);
            
            $trip->distance = ($trip->distance / 1000);

            
            
            $berat_item = DB::table('carts')
            ->leftJoin('items','carts.item_id','items.id')
            ->leftJoin('request_items', 'carts.request_id', 'request_items.id')
            ->select(DB::raw('SUM(cart_item_quantity * CASE WHEN carts.item_id is null THEN request_items.request_weight else items.item_weight END) AS berat_ongkir'))
            ->where('carts.user_id', auth()->user()->id)
            ->first();

            $trip->ongkir = (5000 * (2 + (int)($trip->distance / 100))) + (($berat_item->berat_ongkir + 1) * 1000);

            // dd($trip->ongkir);

            $item = DB::table('carts')
                ->join('items', 'carts.item_id', 'items.id')
                ->select('items.*', 'carts.*')
                ->where('carts.user_id', auth()->user()->id)
                ->where('carts.item_id', '<>', 'NULL')
                ->where('carts.cart_status', 'unpaid')
                ->where('carts.trip_id', $trip->trip_id)
                ->get();


            $request = DB::table('carts')
                ->join('request_items', 'carts.request_id', 'request_items.id')
                ->select('request_items.*', 'carts.*')
                ->where('request_items.request_status', '<>', 'rejected')
                ->where('carts.user_id', auth()->user()->id)
                ->where('carts.cart_status', 'unpaid')
                ->where('carts.trip_id', $trip->trip_id)
                ->get();

            
                foreach($request as $req){

                    $req->limit = new Carbon($req->created_at);
                    $req->limit = $req->limit->addDay(2);
                    
                    if($req->limit > $trip->start_date){
        
                        $req->limit =  new Carbon($trip->start_date);
                    }
                    
                    $req->approvable = Carbon::now() < $req->limit;
                    $req->limit = $req->limit->toDayDateTimeString();

                    if(!$req->approvable){
                        $req->request_status = 'past the time limit';
                    }
        
                }
            
            // $total_price_intrip = DB::table('items')
            
            
            // $array_item = array('items' => $item, 'request_items' => $request);
            $array_item = app()->make('stdClass');
            $array_item->items = $item;
            $array_item->request_items = $request;
            // $array_trip = array_add($array_trip, $trip->trip_id, $array_item);
            $array_trip = Arr::add($array_trip, $trip->trip_id, $array_item);

            
        }

        // dd($cart_trip);
        // $cart_data = DB::table('carts')
        // ->leftJoin('items','carts.item_id','items.id')
        // ->leftJoin('request_items', 'carts.request_id', 'request_items.id')
        // ->select(DB::raw('(CASE WHEN carts.item_id IS null THEN request_items.trip_id ELSE items.trip_id END) AS trip_id'))
        // ->where('carts.user_id', auth()->user()->id)
        // ->groupBy('trip_id')
        // ->get();
        // dd($cart_trip, $array_trip);
        return view('cart', compact('array_trip', 'check_status', 'cart_trip', 'rejected'));
    }

    function deleteItemCart(Request $request)
    {
        $cart_item = DB::table('carts')
            ->where('carts.item_id', $request->item_id)
            ->delete();

        return back();
    }
    function deleteRequestCart(Request $request)
    {
        $cart_item = DB::table('carts')
            ->where('carts.request_id', $request->request_id)
            ->delete();

        $delete_request = DB::table('request_items')
            ->leftJoin('carts', 'carts.request_id', 'request_items.id')
            ->where('request_items.id', $request->request_id)
            ->delete();

        return back();
    }

    function pay(Request $request)
    {
        $decode_trip = [];
        $decode_item = [];
        $decode_request = [];
        $decode_beacukai_pabean = [];
        $decode_shipping_type = [];
        $decode_shipping_price = [];
        $decode_price_per_trip = [];

        // dd($request);
        foreach ($request->cart_trip as $trip) {

            $decoded_trip = json_decode($trip);
            $decode_trip = Arr::add($decode_trip, $decoded_trip->trip_id, $decoded_trip);
        }

        foreach ($request->array_trip_item as $item) {

            $decoded_item = json_decode($item);
            if ($decoded_item) {

                $decode_item = Arr::add($decode_item, $decoded_item[0]->trip_id, $decoded_item);
            }
        }


        foreach ($request->array_trip_request as $item_request) {


            $decoded_request = json_decode($item_request);
            if ($decoded_request) {
                $decode_request = Arr::add($decode_request, $decoded_request[0]->trip_id, $decoded_request);
            }
        }



        foreach ($request->beacukai_pabean as $key => $beacukai_pabean) {
            $decoded_beacukai_pabean = json_decode($beacukai_pabean);
            $decode_beacukai_pabean = Arr::add($decode_beacukai_pabean, $key, $decoded_beacukai_pabean);
        }


        foreach ($request->shipping_type as $key => $shipping_type) {
            $decoded_shiping_type = json_decode($shipping_type);
            $decode_shipping_type = Arr::add($decode_shipping_type, $key, $decoded_shiping_type);
        }

        foreach($request->shipping_price as $key => $shipping_price) {
            $decoded_shipping_price = json_decode($shipping_price);
            $decode_shipping_price = Arr::add($decode_shipping_price, $key, $decoded_shipping_price);
        }
        foreach ($request->price_per_trip as $key => $price_per_trip) {
            $decoded_price_per_trip = json_decode($price_per_trip);
            $decode_price_per_trip = Arr::add($decode_price_per_trip, $key, $decoded_price_per_trip);
        }


        // foreach($request->array_trip_request as $request){

        //     $decode_request[] = json_decode($item);
        // }

        // dd($decode_trip, $decode_item, $decode_request, $decode_shipping_type, $decode_beacukai_pabean);
        $check_address = User::find(auth()->user()->id);
        if (!$check_address->address) {
            return back()->withErrors(['msg' => 'You must fill your address before checking out!']);
        }
        $check_stock = DB::table('carts')
            ->join('items', 'carts.item_id', 'items.id')
            ->select('items.item_name', 'carts.cart_item_quantity', 'items.item_stock')
            ->where('carts.user_id', auth()->user()->id)
            ->where('items.item_stock', '<', 'carts.cart_item_quantity')
            ->first();

        if ($check_stock) {
            return back()->withErrors(['msg' => 'The stock from ' . $check_stock->item_name . ' is lower than your cart quantity. Please change your item quantity in the trip!']);
        }
        $paid_validation = auth()->user()->balance;
        $rules = [
            'total_all' => 'lte:' . $paid_validation,

        ];
        $messages = [
            'total_all.lte' => 'Your balance is not sufficient'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }


        foreach ($decode_trip as $trip) {
            $trip_nih = $trip->trip_id;
            $shipping_type_transaction = $decode_shipping_type[$trip_nih];
            $shipping_price_transaction = $decode_shipping_price[$trip_nih];
            $price_per_trip = $decode_price_per_trip[$trip_nih];
            $transaction_header = Transaction::create([
                'user_id' => auth()->user()->id,
                'trip_id' => $trip_nih,
                'shipping_type_id' => $shipping_type_transaction,
                'shipping_trip_price' => $shipping_price_transaction,
                'beacukai_pabean' => $trip->tax,
                'total_paid' => $price_per_trip
            ]);

            if($decode_item){
                $item_transaction = $decode_item[$trip_nih];
                foreach ($item_transaction as $item) {
                    $transaction_detail = TransactionDetail::create([
                        'transaction_id' => $transaction_header->id,
                        'item_id' => $item->item_id,
                        'quantity' => $item->cart_item_quantity,
                        'profit' => $item->cart_item_quantity * ($item->item_display_price - $item->item_price),
                        'total' => $item->cart_item_quantity * $item->item_display_price
                    ]);
    
                    $update_stock = Item::find($item->item_id);
                    $update_stock->item_stock -= $item->cart_item_quantity;
                    $update_stock->save();
                }
            }

            if($decode_request){
                $request_transaction = $decode_request[$trip_nih];

                foreach ($request_transaction as $request_item) {
                    // dd($request_item);
                    $transaction_detail = TransactionDetail::create([
                        'transaction_id' => $transaction_header->id,
                        'request_id' => $request_item->request_id,
                        'quantity' => $request_item->request_quantity,
                        'total' => $request_item->request_quantity * $request_item->request_price
                    ]);
                }
            }

            $transaction_list_admin = TransactionList::create([
                'transaction_id' => $transaction_header->id,
                'hold_balance' => $transaction_header->total_paid
            ]);

            $admin_balance_update = User::where('is_admin', true)->first();
            $admin_balance_update->balance = $admin_balance_update->balance + $transaction_list_admin->hold_balance;
            $admin_balance_update->save();
                       
            $beacukai_pabean_transaction = $decode_beacukai_pabean[$trip_nih];
            // dd($item_transaction, $request_transaction, $shipping_type_transaction, $beacukai_pabean_transaction, $price_per_trip);
        }


        $pay_cart = Cart::where('user_id', auth()->user()->id)->update([
            'cart_status' => 'paid'
        ]);

        $minus_balance = User::find(auth()->user()->id);
        $minus_balance->balance = $minus_balance->balance - $request->total_all;
        $minus_balance->save();


        // $money_flows = MoneyFlow::create([
        //     'user_id' => auth()->user()->id,
        //     'transaction_id' => $transactions->id,
        //     'balance' => $request->total_pay,
        //     'description' => 'From Buyer to Admin'
        // ]);
        return redirect('/dashboard');
    }
}
