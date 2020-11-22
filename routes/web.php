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

Route::get('/', "HomeController@index");

Route::get('/product/{id}', function ($id) {
    return view('product-details');
});

Route::get('/products', "HomeController@products");

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
Route::post("verifyuser/{hash}", "CustomLoginController@verifyuser");



/* Products Routes Section Starts */
Route::post("add-product", "ProductsController@add_product");
Route::get('/admin/products', "ProductsController@get_products");
/* Products Routes Section Ends */


/* Category Routes Section Starts */
Route::get('/admin/categories', "CategoriesController@get_category")->name('category');
Route::post("add-category", "CategoriesController@add_category")->name('addcategory');
Route::get('/edit_category/{id}','CategoriesController@edit')->name('editCategory');
Route::post('/update_category','CategoriesController@update')->name('updateCategory');
Route::get('/delete_category/{id}','CategoriesController@destroy')->name('deleteCategory');
/* Category Routes Section Starts */


Route::post('/admin/upload', "MediaController@upload");

Route::get("/admin/media", "MediaController@index");
Route::post("/admin/fetch-images", "MediaController@fetch_images");
