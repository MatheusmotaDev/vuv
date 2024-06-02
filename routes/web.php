<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/dashboard', function () {
    return view('customer.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/customer/new-quotation', function () {
    return view('customer.new-quotation');
})->middleware(['auth', 'verified'])->name('customer.new-quotation');


Route::get('/vendedor/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth', 'role:seller', 'verified'])->name('seller.dashboard');

Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
