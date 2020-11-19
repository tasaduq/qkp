<?php

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

Route::get('/product/{slug}', function ($slug) {
    return view('product-details');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/our-farms', function () {
    return view('our-farms');
});

Route::get('/shariah-compliant', function () {
    return view('sharih-compliance');
});

Route::get('/mandi', function () {
    return view('mandi');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


// Admin

Route::get('/admin/register', function () {
    return view('admin.register');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/admin/add_product', function () {
    return view('admin.add_product');
});


Route::get('/admin/category', function () {
    return view('admin.category');
});

Route::get('/admin/add_category', function () {
    return view('admin.add_category');
});


Route::get('/admin/orders', function () {
    return view('admin.orders');
});
Route::get('/admin/order_details', function () {
    return view('admin.order_details');
});




/* Functionality Routes */



Route::post("ajax-login", "CustomLoginController@login");
Route::post("ajax-register", "CustomLoginController@register");

Route::post("add-product", "ProductsController@add_product");


Route::get('/admin/products', "ProductsController@get_products");


Route::post('/admin/upload', "MediaController@upload");

Route::get("/admin/media", "MediaController@index");
