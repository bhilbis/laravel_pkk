<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EcomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

//nav
route::get('/',[EcomController::class,'index'])->name('home');
route::get('/products',[EcomController::class,'product'])->name('produk');
route::get('/cart',[EcomController::class,'cart'])->name('cart');


//rute buat produk-produk
Route::get('/addtocart/{id}', [EcomController::class, 'addtocart'])->name('addtocart');
Route::get('/checkout', [EcomController::class, 'checkout'])->name('checkout');
Route::get('/processcheckout', [EcomController::class, 'processCheckout'])->name('processcheckout');
Route::post('/processcheckout',[EcomController::class,'processCheckout'] )->name('prosescheckout');

Route::group(['prefix' => 'cart'], function () {
    Route::get('/show', [EcomController::class, 'showCart']);
    Route::post('/add', [EcomController::class, 'addToCart']);
    Route::post('/update-product-quantity', [EcomController::class, 'updateProductQuantity'])
    ->name('updateProductQuantity');
    Route::post('/remove-product', [EcomController::class, 'removeProduct'])
    ->name('removeProduct');
});

//produkcontroller
Route::get('/product', [ProductController::class, 'index'])->name('product'); 

Route::group(['middleware' => ['web']], function () {
    route::get('/cart',[EcomController::class,'cart'])->name('cart')->middleware('auth');
});

//login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginOnly'])->name('doLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'doLogout'])->name('doLogout');

//regis
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('doRegister');