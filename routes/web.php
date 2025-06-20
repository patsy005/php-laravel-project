<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IglooController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\EmployeeAuthMiddleware;
use Illuminate\Support\Facades\Route;

// 🟢 Public routes (authentication)
Route::get('/login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee.login');
Route::post('/login', [EmployeeAuthController::class, 'login'])->name('employee.login.submit');
Route::post('/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');

// 🔐 Protected routes (only for logged-in employees)
Route::middleware([EmployeeAuthMiddleware::class])->group(function () {
    // Dashboard (home)
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Igloos
    Route::get('/igloos/json', [IglooController::class, 'getJson'])->name('igloos.json');
    Route::resource('igloos', IglooController::class);

    // Employees
    Route::resource('employees', EmployeeController::class);

    // Customers
    Route::resource('customers', CustomerController::class);

    // Discounts
    Route::resource('discounts', DiscountController::class);

    // Bookings
    Route::resource('bookings', BookingController::class);
});