<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IglooController;

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/igloos', [IglooController::class, 'index'])->name('igloos.index');
// Route::get('/igloos/create', [IglooController::class, 'create'])->name('igloos.create');
// Route::post('/igloos', [IglooController::class, 'store'])->name('igloos.store');
// Route::get('/igloos/{igloo}', [IglooController::class, 'show'])->name('igloos.show');
// Route::get('/igloos/{igloo}/edit', [IglooController::class, 'edit'])->name('igloos.edit');
// Route::put('/igloos/{igloo}', [IglooController::class, 'update'])->name('igloos.update');
// Route::delete('/igloos/{igloo}', [IglooController::class, 'destroy'])->name('igloos.destroy');

// Route::get('/igloos/json', [IglooController::class, 'getJson'])->name('igloos.json');

Route::get('/igloos/json', [IglooController::class, 'getJson'])->name('igloos.json');

Route::get('/igloos', [IglooController::class, 'index'])->name('igloos.index');
Route::get('/igloos/create', [IglooController::class, 'create'])->name('igloos.create');
Route::post('/igloos', [IglooController::class, 'store'])->name('igloos.store');
Route::get('/igloos/{igloo}', [IglooController::class, 'show'])->name('igloos.show');
Route::get('/igloos/{igloo}/edit', [IglooController::class, 'edit'])->name('igloos.edit');
Route::put('/igloos/{igloo}', [IglooController::class, 'update'])->name('igloos.update');
Route::delete('/igloos/{igloo}', [IglooController::class, 'destroy'])->name('igloos.destroy');
