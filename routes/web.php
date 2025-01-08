<?php

use App\Http\Controllers\Admin\Book\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'getUsers'])->name('users');

Route::prefix('/login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');

});
Route::prefix('/register')->group(function () {
    Route::get('/', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/', [RegisterController::class, 'store'])->name('register.store');

});
Route::get('/profile', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::prefix('/admin/dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'create'])->name('admin.main');
    Route::resource('books', BookController::class)->names('admin.books');
});
