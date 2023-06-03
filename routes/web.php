<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
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
Route::post('/updateProfile', [DashboardController::class, 'updateProfile']);
Route::post('/addTrip', [DashboardController::class, 'makeTrip']);
Route::post('/publishTrip', [DashboardController::class, 'publishTrip']);
Route::post('/addItem', [DashboardController::class, 'addItem']);
Route::post('/removeItem', [DashboardController::class, 'removeItem']);
Route::post('/addWtbItem', [DashboardController::class, 'addWtbItem']);
Route::post('/removeWtbItem', [DashboardController::class, 'removeWtbItem']);
Route::post('/trip-draft', [DashboardController::class, 'updateTrip']);
Route::post('/received', [DashboardController::class, 'received']);
Route::get('/dashboard', [DashboardController::class, 'viewDashboard']);
Route::get('/trip-draft/{id}', [DashboardController::class, 'editTrip']);


//trip
Route::get('/trip', [PageController::class, 'viewTripList']);
Route::post('/filter_category', [PageController::class, 'filter_category']);
Route::post('/search_trip', [PageController::class, 'search_trip']);
Route::get('/trip-detail/{id}', [PageController::class, 'viewTripDetail']);
Route::post('/addRequestItem', [TransactionController::class, 'addRequestItem']);
Route::post('/addToCart', [TransactionController::class, 'addToCart']);




Route::get('/item', [PageController::class, 'viewWtbList']);
Route::get('/item-detail/{id}', [PageController::class, 'viewWtbDetail']);


//cart
Route::get('/cart', [TransactionController::class, 'viewCart']);
Route::post('/deleteItemCart', [TransactionController::class, 'deleteItemCart']);
Route::post('/deleteRequestCart', [TransactionController::class, 'deleteRequestCart']);
Route::post('/pay', [TransactionController::class, 'pay']);

//order
Route::get('/order', [PageController::class, 'viewOrder']);
Route::post('/send', [PageController::class, 'send']);
Route::post('/acceptRequest', [PageController::class, 'acceptRequest']);
Route::post('/rejectRequest', [PageController::class, 'rejectRequest']);
Route::post('/cancelBuyItem', [PageController::class, 'cancelBuyItem']);
Route::post('/itemBought', [PageController::class, 'itemBought']);
Route::post('/requestBought', [PageController::class, 'requestBought']);
Route::post('/cancelBuyRequest', [PageController::class, 'cancelBuyRequest']);
Route::post('/shipping', [PageController::class, 'shipping']);


//admin
Route::get('/transaction-list', [PageController::class, 'transaction_list']);

// Route::get('/transaction-list', function () {
//     return view('transaction-list');
// });
Route::get('/', function () {
    return view('home');
});


// Route::get('/item', function () {
//     return view('item');
// });


Route::get('/ongoing-trip', function () {
    return view('ongoing-trip-detail');
    // return view('trip');
});

Route::get('/item-detail', function () {
    return view('item-detail');
});

Route::get('/checkout', function () {
    return view('checkout');
});

// Route::get('/cart', function () {
//     return view('cart');
// });

// Route::get('/trip', function () {
//     return view('trip');
// });

Route::get('/trip-detail', function () {
    return view('trip-detail');
});

Route::get('/traveler', function () {
    return view('traveler-profile');
});


Route::get('/history', function () {
    return view('transaction-history');
});

Route::get('/trip-checkout', function () {
    return view('trip-checkout');
});

Route::get('/approval', function () {
    return view('approval');
});

Route::get('/profile', function () {
    return view('profile');
});



// Route::get('/order', function () {
//     return view('order');
// });


