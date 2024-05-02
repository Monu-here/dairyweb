<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
$products = Product::all();


Route::get('/', function () {
    $products = Product::all();

    return view('user.home',['products' => $products]);
});
Route::get('/about', function () {
    return view('user.about');
});
Route::get('/products', function () {
    $products = Product::all();

    return view('user.product', ['products' => $products]);
})->name('product');

Route::get('/blogs', function () {
    $blogs = Blog::all();

    return view('user.blog',['blogs'=>$blogs]);
});
Route::get('/contact', function () {
    return view('user.contact');
});

Route::match(['GET','POST'],'/login', [AdminController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], '/logout', [AdminController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

    Route::prefix('products')->name('products.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::post('', [ProductController::class, 'store'])->name('store');
        Route::match(['get', 'put'], 'edit/{product}', [ProductController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{product}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name('index');
        Route::post('', [BlogController::class, 'store'])->name('store');
        Route::match(['get', 'put'], 'edit/{blog}', [BlogController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/delete/{blog}', [BlogController::class, 'destroy'])->name('delete');
    });

});

Route::get('/admin', function () {
    return redirect()->route('login');
});

