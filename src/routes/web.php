<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomLoginController;
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


if( config('app.maintenance') ){
    Route::get('/', function () {
        return view('maintenance');
    });
}
else {

Route::middleware("calculations")->group(function () {

    Route::get('/', "HomeController@index")->name('home');

    Route::get('/emailtest/{order}/{status}', "HomeController@emailtest");

    Route::get('/product/{id}', "HomeController@product_detail");
    Route::get('/products', "HomeController@products");
    Route::get('/products-filter', "HomeController@products_filter");
    
    Route::get('/mandi', "HomeController@mandi")->name('mandi');
    Route::get('/cart', "CartController@index");
    Route::get('/checkout', "CartController@checkout");
    Route::post('/shipping-cart-update', "CartController@shipping_cart_update");
    

    Route::prefix('cart')->group(function () {
        Route::post('add-to-cart', "CartController@add_to_cart");
        Route::post('remove-from-cart', "CartController@remove_from_cart");
        
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', "UserController@profile")->name('profile');
        Route::get("/process_checkout", "CartController@process_checkout");
        Route::get("/view/invoice/{invoice}", "HomeController@view_invoice");
        

        Route::post("/process-cart", "CartController@process_checkout");
        Route::post("/cancel-order-animal", "OrderController@cancel_order_animal");
        Route::post("/cancel-order", "OrderController@cancel_order");
        Route::get("/payment", "OrderController@payment");
        Route::get("/payment/{order_no}", "OrderController@payment");
        Route::get("/instalment-payment/{installment_id}", "OrderController@installment_payment");
        Route::post("/upload-receipt", "OrderController@upload_receipt");
        Route::post("/upload-installment-receipt", "OrderController@upload_installment_receipt");
        Route::post("/request-installment-cash-collection", "OrderController@installment_request");
        
        
        
        
    });

});

Route::get('/filter-params', 'HomeController@filter_params');


Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/our-farm', function () {
    return view('our-farm');
});

Route::get('/shariah-compliance', function () {
    return view('shariah-compliance');
});

Route::get('/Refund-and-cancellation-policy', function () {
    return view('Refund-and-cancellation-policy');
}); 

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/faqs', function () {
    return view('faqs');
});

// Route::get('/payment', function () {
//     return view('payment');
// });

// Route::middleware(['auth'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
//     return view('profile');
// })->name('profile');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


// Admin
Route::get('/admin', function () {
    if(!Auth::check()){
        return redirect('/admin/login');
    } else {
        return redirect('/admin/dashboard');
    }
});
Route::get('/admin/login', function () {
    return view('admin.login');
});
/* Functionality Routes */
Route::post("ajax-login", "CustomLoginController@login");
Route::post("ajax-register", "CustomLoginController@register");
Route::get("verifyuser", "CustomLoginController@verifyuser");


Route::middleware(['admin'])->group(function(){


    Route::get('/admin/register', function () {
        return view('admin.register');
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

    
    Route::get('/admin/orders', "OrderController@get_orders")->name('orders');

    Route::get('/admin/order/{id}', "OrderController@order_detail")->name('order_detail');

    Route::get('/admin/verify_order/{status}/{id}', "OrderController@vrfy_order");

    Route::post('/admin/update_order_status/{status}/{id}', "OrderController@update_order_sts");

    Route::post('/admin/update_orders_status', "OrderController@update_orders_sts")->name('update_orders_sts');

    Route::get('/admin/installments', "OrderController@get_installments")->name('installments');

    Route::get('/admin/verify_installment/{id}', "OrderController@vrfy_install");

    Route::post('/admin/update_installment_status/{status}/{id}', "OrderController@update_install_sts");

    Route::post('/admin/update_installments_status', "OrderController@update_installs_sts")->name('update_installs_sts');

    

    
    /* Products Routes Section Starts */
    Route::post("add-product", "ProductsController@add_product");
    Route::get('/admin/products', "ProductsController@get_products")->name('products');
    Route::get('/admin/editproduct/{id}','ProductsController@edit')->name('editproduct');
    Route::post('/admin/updateproduct','ProductsController@update')->name('updateproduct');
    Route::get('/admin/cloneproduct/{id}','ProductsController@clone')->name('cloneproduct');
    Route::get('/admin/delete_product/{id}','ProductsController@destroy')->name('deleteproduct');
    Route::post('/product-update-bulk','ProductsController@bulk_update');
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


});

Route::middleware(['superadmin'])->group(function(){
    Route::get('/admin/settings', 'SettingsController@view')->name('settings');
    Route::post('/update-settings', 'SettingsController@update');
    
    Route::get('/admin/shipping', 'ShippingController@view')->name('Shipping');
    Route::post('/update-shipping', 'ShippingController@update');
    
    Route::get('/admin/users', "UsersController@get_users")->name('users');
    Route::post('/update-role', "UsersController@update_role");
});






Route::get("/dumpdata", "DebugController@dumpdata");
Route::get("/dumpcart", "CartController@dumpcart");



/* Contact Us Section Starts */
Route::post("add-contact", "ContactusController@add_contact");

/* Facebook Routes  */
Route::get('slogin/{provider}', [CustomLoginController::class, 'redirectToProvider']);
Route::get('slogin/{provider}/callback', [CustomLoginController::class, 'handleProviderCallback']);

// Route::get("/productssearch", "ProductsController@productssearch");
// Route::get('search', ['as' => 'search', 'uses' => 'ProductsController@productssearch']);

}