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

Route::get('/product/{id}', "HomeController@product_detail");

Route::get('/products', "HomeController@products");


Route::get('/mandi', "HomeController@mandi");
    


Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/our-farm', function () {
    return view('our-farm');
});

Route::get('/shariah-compliant', function () {
    return view('sharih-compliance');
});


Route::get('/cart', "CartController@index");
Route::get('/checkout', "CartController@checkout");
    

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/faqs', function () {
    return view('faqs');
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


Route::get('/admin/add_product', "ProductsController@add_product_view");


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
Route::get("verifyuser/{hash}", "CustomLoginController@verifyuser");


/* Contact Us Section Starts */
Route::post("add-contact", "ContactusController@add_contact");




/* Products Routes Section Starts */
Route::post("add-product", "ProductsController@add_product");
Route::get('/admin/products', "ProductsController@get_products")->name('products');
Route::get('/admin/editproduct/{id}','ProductsController@edit')->name('editproduct');
Route::post('/admin/updateproduct','ProductsController@update')->name('updateproduct');
Route::get('/admin/cloneproduct/{id}','ProductsController@clone')->name('cloneproduct');
Route::get('/admin/delete_product/{id}','ProductsController@destroy')->name('deleteproduct');
/* Products Routes Section Ends */


/* Category Routes Section Starts */
Route::get('/admin/categories', "CategoriesController@get_category")->name('category');
Route::post("/admin/add-category", "CategoriesController@add_category")->name('addcategory');
Route::get('/admin/edit_category/{id}','CategoriesController@edit')->name('editCategory');
Route::post('/admin/update_category','CategoriesController@update')->name('updateCategory');
Route::get('/admin/delete_category/{id}','CategoriesController@destroy')->name('deleteCategory');
/* Category Routes Section Starts */


Route::post('/admin/upload', "MediaController@upload");

Route::get("/admin/media", "MediaController@index");
Route::post("/admin/fetch-images", "MediaController@fetch_images");

Route::get("/dumpdata", "HomeController@dumpdata");




Route::prefix('cart')->group(function () {
    Route::post('add-to-cart', "CartController@add_to_cart");
});