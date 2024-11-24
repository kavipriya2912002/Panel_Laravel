<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\BusController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('admin.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);

    
});

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/buses', [BusController::class, 'index'])->name('bus.index'); // View buses
    Route::post('/buses', [BusController::class, 'store'])->name('bus.store'); // Add bus
    Route::put('/buses/{id}', [BusController::class, 'update'])->name('bus.update'); // Update bus
    Route::get('/buses/{id}', [BusController::class, 'edit'])->name('bus.edit');

   // In routes/web.php or routes/api.php
Route::delete('/buses/{id}', [BusController::class, 'destroy'])->name('buses.destroy');

    
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});
