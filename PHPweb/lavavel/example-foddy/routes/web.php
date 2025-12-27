<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UserController;


Route::get('/', function () {
    $products = \App\Models\Products::with('category')->where('status', 1)->orderBy('created_at', 'desc')->take(8)->get();
    return view('index', compact('products'));
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

// Trang sản phẩm đơn lẻ và trang danh mục sản phẩm
Route::get('/product/{id}', [App\Http\Controllers\HomeController::class, 'single_product'])->name('product.show');
Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'category_product'])->name('category.show');

Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');

////////////admin
Auth::routes();

// admin
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('admin');

///////////////////
Route::get('/category/category', [\App\Http\Controllers\admin\CategoryController::class, 'index'])->name('category');

Route::get('/products/products', [\App\Http\Controllers\admin\ProductController::class, 'index'])->name('products');
///////////////////

//////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','role:admin,staff']], function () {
    // resources
    Route::resource('products', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);
    // user
    Route::resource('user', App\Http\Controllers\admin\UserController::class);
    // customers (site customers separate from admin/staff users)
    Route::get('customers', [App\Http\Controllers\admin\UserController::class, 'customers'])->name('customers.index');
});


