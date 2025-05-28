<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('index');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/product_single', function () {
    return view('product_single');
});

Route::get('/cart', function () {
    return view('cart');
});


Route::get('/checkout', function () {
    return view('checkout');
});


Route::get('/shop', function () {
    return view('shop');
});


Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog_single', function () {
    return view('blog_single');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});

Route::get('/login', function () {
    return view('signin');
});

Route::get('/register', function () {
    return view('signup');
});

Route::resource('users', UserController::class);

Route::resource('ratings', \App\Http\Controllers\RatingController::class);
Route::resource('carts', \App\Http\Controllers\CartController::class);
Route::resource('contacts', \App\Http\Controllers\ContactController::class);
Route::resource('productsDetail', \App\Http\Controllers\ProductDetailController::class);
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
// Route::resource('orders', \App\Http\Controllers\OrderController::class);
Route::resource('orders', \App\Http\Controllers\OrderController::class);

Route::resource('coupons', \App\Http\Controllers\CouponController::class);
Route::resource('wishlists', \App\Http\Controllers\WishlistController::class);
Route::resource('BillingDetail', \App\Http\Controllers\BillingDetailController::class);