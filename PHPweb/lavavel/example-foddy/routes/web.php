<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');

Route::get('/product', [ProductController::class, 'showProductsForUser'])->name('product');
// Route::get('/product', function () {
//     return view('product');
// })->name('product');

// Single product and category pages (public frontend)
Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'single_product'])->name('product.show');
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'category_product'])->name('category.show');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

////////////admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

///////////////////
Route::get('/category/category', [\App\Http\Controllers\admin\CategoryController::class, 'index'])->name('category');

Route::get('/products/products', [\App\Http\Controllers\admin\ProductController::class, 'index'])->name('products');
///////////////////
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('admin');

//////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//Route::resource('category', App\Http\Controllers\admin\CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('category', CategoryController::class);
// Route::resource('customer', App\Http\Controllers\admin\CustummerController::class);
// Route::resource('user', App\Http\Controllers\admin\UserController::class);

});


