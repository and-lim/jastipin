<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function register(Request $request){

        $search_city = DB::table('cities')
        ->select('*')
        ->where('name', $request->city)
        ->first();

        if(!$search_city){
            return back()->withErrors(['msg' => 'The city name is not a valid Indonesian city']);
        }else{

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
    
    function login(Request $request){
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
}

