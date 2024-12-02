<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
  
Route::post('/dashboard', [WalletController::class, 'addMoney']);
Route::post('/search-routes', [RouteController::class, 'search']);
Route::get('/all-routes', [RouteController::class, 'getAllRoutes']);

Route::get('/seats/{routeId}', [SeatController::class, 'getSeats']);
Route::post('/seats/book', [SeatController::class, 'bookSeat']);

});


Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/user-status/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

