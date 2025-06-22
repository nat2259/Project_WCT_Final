<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\ProductDetail; 
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;
use App\Http\Controllers\CheckoutController;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;



    Route::post('/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');

    // Route for the contact form
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // Route for the home page
    Route::get('/dashboard', function () {
        $products = ProductDetail::all();
        return view('index', compact('products'));
    })->name('dashboard');

//     Route::get('/', function () {
//     $products = ProductDetail::all();
//     return view('index', compact('products'));
// })->middleware(['auth', 'verified'])->name('dashboard');

     Route::get('/', function () {
        $products = ProductDetail::all();
        return view('index', compact('products'));
    })->name('dashboard');


    // Route for the about page
    Route::get('/about', function () {
        return view('about');
    });

    //Route::get('/contact', function () {
    //  return view('contact');
    //});

    // Route for the prodct_single  page
    Route::get('/product_single', function () {
        return view('product_single');
    });


    // Route for the checkout page
    Route::get('/checkout', function () {
        return view('checkout');
    });

    // Route for the shop page
    Route::get('/shop', function () {
        return view('shop');
    });

    // Route for the blog page
    Route::get('/blog', function () {
        return view('blog');
    });
    // Route for the blog_single page
    Route::get('/blog_single', function () {
        return view('blog_single');
    });

    // Route for the product details page
    Route::post('/productcontroller', [\App\Http\Controllers\ProductDetailController::class, 'store'])
        ->name('product.store');

    Route::get('/products', [ProductController::class, 'showProducts'])->name('products.index');

    // Route for the product cardAdd
    Route::post('/cart/add', [ProductController::class, 'addToCart'])->name('cart.add');
    //Route for the category of products
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/category/{categoryId}', [ShopController::class, 'filterByCategory'])->name('shop.filter');

     // Protected routes that require authentication
    Route::middleware('auth')->group(function () {
   //wishlist routes

    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add', [WishlistController::class, 'store'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
        //cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    // Route for the cart page
   Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
   Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');
   Route::get('/order-success', function () {
    return view('order-success'); // create this blade view
    
})->name('order.success');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.submit');
      //  Route::post('/contact/store', [\App\Http\Controllers\ContactController::class, 'store']);
       // Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
       // Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store']);

    //profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


require __DIR__.'/auth.php';
