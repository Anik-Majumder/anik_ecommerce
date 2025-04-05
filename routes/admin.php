<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BasicinfoController;
use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/register', [AdminController::class, 'createRegister'])
        ->name('register');

    Route::post('/register', [AdminController::class, 'storeRegister']);

    Route::get('/login', [AdminController::class, 'create'])
        ->name('login');

    Route::post('/login', [AdminController::class, 'login'])->name('login-check');

    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
});


//Route::get('/admin/dashboard', function () {
//    return view('admin-dashboard');
//})->name('admin.dashboard');


Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {

    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
});


// admin routes
Route::prefix('admin')->middleware('is_admin')->group(function ()
{
    Route::get('/dashboards', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/get-admins-data', [AdminController::class, 'getAdminData'])->name('get-admin-data');

    Route::resource('/admins', AdminController::class)->names('admin');

//brand routes

    Route::get('/get-brands-data', [BrandController::class, 'getBrandsData'])->name('get-brand-data');

    Route::resource('/brands', BrandController::class)->names('brand');


//basicinfos routes

    Route::get('/get-basicinfos-data', [BasicinfoController::class, 'getBasicinfosData'])->name('get-basicinfos-data');

    Route::resource('/basicinfos', BasicinfoController::class)->names('basicinfos');


//basicinfos routes

    Route::get('/get-basicinfos-data', [BasicinfoController::class, 'getBasicinfosData'])->name('get-basicinfos-data');

    Route::resource('/basicinfos', BasicinfoController::class)->names('basicinfos');

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

//category routes

    Route::get('/get-categories-data', [CategoryController::class, 'getCategoriesData'])->name('get-category-data');

    Route::resource('/categories', CategoryController::class)->names('category');

// subcategories routes

    Route::get('/get-subcategories-data', [SubcategoryController::class, 'getSubcategoriesData'])->name('get-subcategory-data');

    Route::resource('/subcategories', SubcategoryController::class)->names('subcategory');

// blog comment routes

    Route::get('/get-blogcomments-data', [BlogCommentController::class, 'getBlogcommentsData'])->name('get-blogcomment-data');

    Route::resource('/blogcomments', BlogCommentController::class)->names('blogcomment');

// blog comment routes

    Route::get('/get-products-data', [ProductController::class, 'getProductsData'])->name('get-product-data');

    Route::resource('/products', ProductController::class)->names('product');


});

//Route::get('/test-route', function () {
//    return view('backend.pages.admins.index');
//});

