<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});
Route::get('/about', function () {
    return view('user.about');
});
Route::get('/products', function () {
    return view('user.product');
});
Route::get('/blogs', function () {
    return view('user.blog');
});
Route::get('/contact', function () {
    return view('user.contact');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/products', function () {
    return view('admin.products.products');
});
