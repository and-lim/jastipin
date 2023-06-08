<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function register(Request $request)
    {

        $search_city = DB::table('cities')
            ->select('*')
            ->where('name', $request->city)
            ->first();

        if (!$search_city) {
            return back()->withErrors(['msg' => 'The city name is not a valid Indonesian city']);
        } else {

            $user = User::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'is_admin' => false,
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect('/');
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    function profile()
    {
        $show_review = DB::table('rate_reviews')
            ->join('users', 'rate_reviews.reviewer_id', 'users.id')
            ->select('rate_reviews.*', 'users.fullname', 'users.avatar')
            ->where('rate_reviews.user_id', auth()->user()->id)
            ->get();

        $average_rate = DB::table('users')
            ->rightJoin('rate_reviews', 'rate_reviews.user_id', 'users.id')
            ->select(DB::raw('AVG(rate_reviews.rate) as average_rate'))
            ->where('rate_reviews.user_id', auth()->user()->id)
            ->first();

        $rate = number_format($average_rate->average_rate, 2, '.', '');

        $ongoing_trip = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname','users.avatar')
            ->where('status', 'ongoing')
            ->where('trips.user_id', auth()->user()->id)
            ->get();

        $item_in_trip = DB::table('items')
            ->join('trips', 'items.trip_id', 'trips.id')
            ->select('items.*')
            ->where('trips.user_id', auth()->user()->id)
            ->get();

        $finished_trip = DB::table('trips')
            ->join('users', 'trips.user_id', 'users.id')
            ->select('trips.*', 'users.fullname','users.avatar')
            ->where('status', 'finished')
            ->where('trips.user_id', auth()->user()->id)
            ->get();

        return view('profile', compact('show_review', 'rate','ongoing_trip','item_in_trip','finished_trip'));
    }
}
