<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/addTrip', [DashboardController::class, 'makeTrip']);
Route::post('/addItem', [DashboardController::class, 'addItem']);
Route::post('/removeItem', [DashboardController::class, 'removeItem']);

Route::get('/', function () {
    return view('home');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/item', function () {
    return view('item');
});

Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
Route::get('/trip-draft/{id}', [DashboardController::class, 'editTrip']);
Route::post('/trip-draft', [DashboardController::class, 'updateTrip']);

Route::get('/ongoing-trip', function () {
    return view('ongoing-trip-detail');
});
// Route::get('/trip-draft', function () {
//     return view('trip-draft');
// });

Route::get('/item-detail', function () {
    return view('item-detail');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/trip', function () {
    return view('trip');
});

Route::get('/trip-detail', function () {
    return view('trip-detail');
});




Route::get('/order', function () {
    return view('order');
});


