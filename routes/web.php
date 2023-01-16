<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TransController;
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

Route::get('/', function () {
    return view('items.home');
});

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    Route::get('/index' , [AdminController::class,'index']);
    Route::get('/item/detail/{item}',[AdminController::class,'show']);
    Route::get('/viewitem',[AdminController::class,'viewitem'])->name('viewitem');
    Route::get('/update/{item}',[AdminController::class,'updateItem'])->name('updateItem');
    Route::put('/update/item/{item}',[AdminController::class,'update'])->name('update');
    Route::delete('/destroy/item/{item}',[AdminController::class,'destroy'])->name('destroy');
    Route::get('/addItem',[AdminController::class,'viewStore'])->name('viewStore'); 
    Route::post('/store' , [AdminController::class,'store'])->name('store-item');
});

Route::get('/get_login',[UserController::class,'login']);

Route::get('/get_register',[UserController::class,'register']);

Route::post('/login',[UserController::class,'create_login'])->name('login');

Route::post('/logout' , [UserController::class,'logout'])->name('logout');

Route::post('/register' ,[UserController::class,'create_register']);

Route::get('/edit_profile/{user}',[UserController::class,'edit_profile']);

Route::post('/update_profile/{user}',[UserController::class,'update_profile']);

Route::get('/edit_password/{user}',[UserController::class,'edit_password']);

Route::post('/update_password/{user}',[UserController::class ,'update_password']);


Route::get('/index',[ItemController::class, 'index']);

Route::get('/item/detail/{item}',[ItemController::class,'show']);

Route::post('/item/cart/{item}',[ItemController::class,'add_cart'])->name('cart');


Route::get('/cartList',[CartController::class,'index']);

Route::post('/checkout/{grand_total}',[CartController::class,'checkout'])->name('checkout');

Route::get('/cart/update/{cart}',[CartController::class,'viewUpdate']);

Route::post('/cart/update_cart/{cart}',[CartController::class,'update']);

Route::delete('/cart/delete/{cart}',[CartController::class,'delete']);

Route::get('/history',[TransController::class,'index']);

