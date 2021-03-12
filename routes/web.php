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
    return redirect()->to('/login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('product-variant', 'VariantController');
    Route::resource('product', 'ProductController');
    Route::resource('blog', 'BlogController');
    Route::resource('blog-category', 'BlogCategoryController');
    Route::post('store-product',[\App\Http\Controllers\ProductController::class,'store']);
    Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::get('/edit/{id}',[\App\Http\Controllers\ProductController::class,'edit']);
    Route::put('/edit-product/{id}',[\App\Http\Controllers\ProductController::class,'update']);
});
