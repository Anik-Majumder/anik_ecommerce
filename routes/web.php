<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BasicinfoController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified'])->name('user.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin-dashboard');
})->middleware(['is_admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





// admin routes

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/register', [AdminController::class, 'createRegister'])
        ->name('register');

    Route::post('/register', [AdminController::class, 'storeRegister']);

    Route::get('/login', [AdminController::class, 'create'])
        ->name('login');

    Route::post('/login', [AdminController::class, 'store']);
});

Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});

// backend routes

// admin routes

Route::get('/get-admins-data', [AdminController::class, 'getAdminData'])->name('get-admin-data');

Route::resource('/admins', AdminController::class)->names('admin');

//brand routes

Route::get('/get-brands-data', [BrandController::class, 'getBrandsData'])->name('get-brand-data');

Route::resource('/brands', BrandController::class)->names('brand');

//basicinfo routes

Route::get('/get-basicinfo-data', [BasicinfoController::class, 'getBasicinfosData'])->name('get-basicinfo-data');

Route::resource('/basicinfos', BasicinfoController::class)->names('basicinfo');


//basicinfo routes

Route::get('/get-basicinfo-data', [BasicinfoController::class, 'getBasicinfosData'])->name('get-basicinfo-data');

Route::resource('/basicinfos', BasicinfoController::class)->names('basicinfo');

//banner routes

Route::get('/get-banner-data', [BannerController::class, 'getBannersData'])->name('get-banner-data');

Route::resource('/banners', BannerController::class)->names('banner');

//user routes

Route::get('/get-users-data', [UserController::class, 'getUsersData'])->name('get-user-data');

Route::resource('/users', UserController::class)->names('user');

//user routes

Route::get('/get-sliders-data', [SliderController::class, 'getSlidersData'])->name('get-slider-data');

Route::resource('/sliders', SliderController::class)->names('slider');

//size routes

Route::get('/get-sizes-data', [SizeController::class, 'getSizesData'])->name('get-size-data');

Route::resource('/sizes', SizeController::class)->names('size');

//color routes

Route::get('/get-colors-data', [ColorController::class, 'getColorsData'])->name('get-color-data');

Route::resource('/colors', ColorController::class)->names('color');

//Customers routes

Route::get('/get-customers-data', [CustomerController::class, 'getCustomersData'])->name('get-customer-data');

Route::resource('/customers', CustomerController::class)->names('customer');

//Blog routes

Route::get('/get-blogs-data', [BlogController::class, 'getBlogsData'])->name('get-blog-data');

Route::resource('/blogs', BlogController::class)->names('blog');

//subcategories routes

// Route::get('/get-subcategories-data', [SubcategoryController::class, 'getSubcategoriesData'])->name('get-subcategory-data');

// Route::resource('/subcategories', SubcategoryController::class)->names('subcategory');

require __DIR__ . '/auth.php';