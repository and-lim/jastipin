<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function register(){
        return view('register');
    }
    function login(){
        return view('login');
    }
}
