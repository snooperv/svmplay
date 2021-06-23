<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Orders\MakeOrderController;
use App\Http\Controllers\Orders\OrderReviewController;
use App\Http\Controllers\Orders\OrdersController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('/orders', 'orders');

//Route::middleware([Authenticate::class])->group(function() {
Route::get('/make-order', [MakeOrderController::class, 'index']);
Route::post('/make-order', [MakeOrderController::class, 'store']);
Route::get('/orders', [OrdersController::class, 'index']);
Route::get('/orders/{orderId}', [OrderReviewController::class, 'index']);
Route::patch('/orders/{orderId}', [OrderReviewController::class, 'update']);
//});

