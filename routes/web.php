<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'] );

Route::middleware('guest')->group(function(){
    Route::get('/register',[UserController::class,'register']);
    Route::post('/register',[UserController::class,'doRegister']);
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::post('/login',[UserController::class,'doLogin']);
});

Route::get('/home',[HomeController::class,'index']);
Route::middleware('auth')->group(function(){

    Route::get('/logout',[UserController::class,'logout']);
    Route::post('/add',[CartController::class,'addToCart']);
    Route::get('/cart',[CartController::class,'getCart']);
    Route::get('/remove/{cart:id}',[CartController::class,'removeFromCart']);
    Route::put('/updateQty/{cart:id}',[CartController::class,'updateQuantity']);
    Route::get('/checkout',[CheckoutController::class,'checkout']);
    Route::get('/clear',[CartController::class,'clearCart']);
    Route::post('/checkout',[CheckoutController::class,'order']);
    Route::get('/profile',[UserController::class,'profile']);
    Route::get('/orders',[OrderController::class,'getOrder']);
    Route::get('/detailItem/{order:id}',[OrderController::class,'getDetailOrder']);
    Route::post('/payment/{order:id}',[OrderController::class,'payment']);
    Route::get('/profile/{user:id}',[UserController::class,'edit']);
    Route::put('/profile/{user:id}',[UserController::class,'update']);
});

Route::middleware('admin')->group(function(){
Route::post('/admin/dashboard/create',[AdminDashboardController::class,'store']);
//Route::get('/admin/dashboard/{product:id}/edit',[AdminDashboardController::class,'edit']);
Route::resource('/admin/dashboard',AdminDashboardController::class)->except('store','show');
Route::get('/admin/dashboard/orders',[AdminOrderController::class,'index']);
});

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{product:id}',[ProductController::class,'detail']);