<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BasicinfoController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/test', function () {
    return view('test');
});

Route::get('/user/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





// admin routes



Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

// frontend routes

Route::view('/', 'frontend.pages.home')->name('home');
Route::view('/shop', 'frontend.pages.shop')->name('shop');
Route::view('/shop-detail', 'frontend.pages.detail')->name('shop-detail');
Route::view('/shopping-cart', 'frontend.pages.cart')->name('shopping-cart');
Route::view('/checkout', 'frontend.pages.checkout')->name('checkout');
Route::view('/contact', 'frontend.pages.contact')->name('contact');








require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';

