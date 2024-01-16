<?php

use App\Http\Controllers\EcomController;
use App\Http\Controllers\LoginController;
use App\http\Controllers\api\userController;
use App\Http\Controllers\ProductController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//nav
route::get('/',[EcomController::class,'index'])->name('home');
route::get('/products',[EcomController::class,'product'])->name('produk');
route::get('/cart',[EcomController::class,'cart'])->name('cart');

// api
Route::resource('user', userController::class);

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
Route::resource('/products', ProductController::class);
// Route::get('/product', [ProductController::class, 'index'])->name('product.index'); 
// Route::get('/product/create', [ProductController::class, 'create'])->name('product.create'); 
// Route::post('/product', [ProductController::class, 'index'])->name('product.store'); 

Route::group(['middleware' => ['web']], function () {
    route::get('/cart',[EcomController::class,'cart'])->name('cart')->middleware('auth');
    route::get('/products',[EcomController::class,'products'])->name('products')->middleware('auth');
    Route::resource('/products', ProductController::class)->middleware('auth');
});

//login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'loginOnly'])->name('doLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LoginController::class, 'doLogout'])->name('doLogout');

//regis
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('doRegister');