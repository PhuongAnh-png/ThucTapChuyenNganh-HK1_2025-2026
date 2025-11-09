<?php

use Illuminate\Support\Facades\Route;

Route::get('/product', function () {

    return view('product');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


