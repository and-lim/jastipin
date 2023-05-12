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

//login register
Route::get('/login', [PageController::class, 'login']);
Route::get('/register', [PageController::class, 'register']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/welcome', function () {
    return view('welcome');
});

//dashboard
Route::post('/addTrip', [DashboardController::class, 'makeTrip']);
Route::post('/publishTrip', [DashboardController::class, 'publishTrip']);
Route::post('/addItem', [DashboardController::class, 'addItem']);
Route::post('/removeItem', [DashboardController::class, 'removeItem']);
Route::post('/addWtbItem', [DashboardController::class, 'addWtbItem']);
Route::post('/removeWtbItem', [DashboardController::class, 'removeWtbItem']);
Route::post('/trip-draft', [DashboardController::class, 'updateTrip']);
Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
Route::get('/trip-draft/{id}', [DashboardController::class, 'editTrip']);


Route::get('/trip', [PageController::class, 'viewTripList']);
Route::get('/trip-detail/{id}', [PageController::class, 'viewTripDetail']);
Route::get('/item', [PageController::class, 'viewWtbList']);
Route::get('/item-detail/{id}', [PageController::class, 'viewWtbDetail']);

Route::get('/', function () {
    return view('home');
});


// Route::get('/item', function () {
//     return view('item');
// });


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

// Route::get('/trip', function () {
//     return view('trip');
// });




Route::get('/order', function () {
    return view('order');
});


