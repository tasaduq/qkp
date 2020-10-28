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

Route::get('/mandi', function () {
    return view('about-us');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


