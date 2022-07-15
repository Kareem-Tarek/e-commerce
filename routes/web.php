<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FAQsController;


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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');

Route::get('/about-us', [AboutController::class, 'index'])->name('about');

Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');

Route::post('/cart', [CartsController::class, 'store'])->name('cart');

Route::get('/checkout/get/items', [CartsController::class, 'getCartItemsForCheckout']);

Route::post('/process/user/payment', [CartsController::class, 'processPayment']);

// Route::prefix('facebook')->name('facebook.')->group( function(){
//     Route::get('auth' , FacebookController::class, 'LoginUsingFacebook')->name('login');
//     Route::get('callback' , FacebookController::class, 'callbackFromFacebook')->name('callback');
// });