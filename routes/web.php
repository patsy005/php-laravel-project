<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IglooController;
use App\Http\Controllers\EmployeeController;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/igloos/json', [IglooController::class, 'getJson'])->name('igloos.json');

Route::get('/igloos', [IglooController::class, 'index'])->name('igloos.index');
Route::get('/igloos/create', [IglooController::class, 'create'])->name('igloos.create');
Route::post('/igloos', [IglooController::class, 'store'])->name('igloos.store');
Route::get('/igloos/{igloo}', [IglooController::class, 'show'])->name('igloos.show');
Route::get('/igloos/{igloo}/edit', [IglooController::class, 'edit'])->name('igloos.edit');
Route::put('/igloos/{igloo}', [IglooController::class, 'update'])->name('igloos.update');
Route::delete('/igloos/{igloo}', [IglooController::class, 'destroy'])->name('igloos.destroy');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
