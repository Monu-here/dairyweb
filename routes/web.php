<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimonialsController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Testimonial;
use Symfony\Component\Mime\MessageConverter;

$products = Product::all();


Route::get('/', function () {
    $products = Product::all();
    $testimonial = Testimonial::all();

    return view('user.home', ['products' => $products, 'testimonial' => $testimonial]);
});

Route::get('/about', function () {
    return view('user.about');
})->name('user.about');
Route::get('/products', function () {
    $products = Product::all();

    return view('user.product', ['products' => $products]);
})->name('product');

Route::get('/blogs', function () {
    $blogs = Blog::all();

    return view('user.blog',['blogs'=>$blogs]);
});
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/contact', function () {
    return view('user.contact');
})->name('user.contact');

Route::post('/contact', [MessageController::class, 'store'])->name('msg.send');


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
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('', [MessageController::class, 'index'])->name('index');
        Route::get('/{id}', [MessageController::class, 'show'])->name('show');
        Route::delete('/delete/{id}', [MessageController::class, 'destroy'])->name('delete');
    });
    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('', [TestimonialsController::class, 'index'])->name('index');
        Route::post('', [TestimonialsController::class, 'store'])->name('store');
        Route::match(['get', 'put'], 'edit/{testimonial}', [TestimonialsController::class, 'edit'])->name('edit');
        Route::match(['get', 'put'], 'update/{testimonial}', [TestimonialsController::class, 'update'])->name('update');
        Route::delete('/delete/{testimonial}', [TestimonialsController::class, 'destroy'])->name('delete');
    });

    Route::prefix('settings')->name('settings.')->group(function(){
        Route::get('', [SettingController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'],'/homepage', [SettingController::class, 'homePage'])->name('homepage');
        Route::match(['GET', 'POST'],'/footerpage', [SettingController::class, 'footerPage'])->name('footerpage');


        Route::match(['GET', 'POST'],'/contactpage', [SettingController::class, 'contactpage'])->name('contactpage');
        Route::match(['GET', 'POST'],'/aboutpage', [SettingController::class, 'aboutpage'])->name('aboutpage');


    });

});

Route::get('/admin', function () {
    return redirect()->route('login');
});

