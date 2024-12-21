<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;

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




require __DIR__ . '/auth.php';