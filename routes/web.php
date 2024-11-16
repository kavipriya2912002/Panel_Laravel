<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/user-status/{id}', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
});



// Route::prefix('admin')->middleware('auth:admin')->group(function () {
//     Route::get('/admin/login-requests', [AdminController::class, 'getLoginRequests'])->name('admin.login-requests');
// Route::post('/admin/login-requests/{id}/approve', [AdminController::class, 'approveLogin']);
// Route::post('/admin/login-requests/{id}/reject', [AdminController::class, 'rejectLogin']);

// });






require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

