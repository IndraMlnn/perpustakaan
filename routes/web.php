<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;


Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Buku
         Route::resource('books', AdminBookController::class);

    // CRUD User
         Route::resource('users', AdminUserController::class);
   // CRUD Booking

        Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::get('bookings/{booking}', [AdminBookingController::class, 'show'])->name('bookings.show');
        Route::post('bookings/{booking}/approve', [AdminBookingController::class, 'approve'])->name('bookings.approve');
        Route::post('bookings/{booking}/reject', [AdminBookingController::class, 'reject'])->name('bookings.reject');
        Route::post('bookings/{booking}/return', [AdminBookingController::class, 'returnBook'])->name('bookings.return');
});


Route::middleware(['auth', 'role:member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::post('/books/{book}/booking', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
});
