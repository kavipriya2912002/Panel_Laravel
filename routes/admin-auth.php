<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\ServicechargeController;
use App\Http\Controllers\WalletController;
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


    Route::post('/seats/book', [SeatController::class, 'bookSeat']);
    Route::post('/seats/unbook', [SeatController::class, 'unbookSeat']);
    Route::get('/seats/{routeId}', [SeatController::class, 'getAdminSeats']);
    Route::post('/add-amount',[WalletController::class,'AddMoneyToUser']);
    // routes/api.php

    Route::put('/seats/book/{seatId}', [SeatController::class, 'bookSeatadmin']);
    Route::put('/seats/unbook/{seatId}', [SeatController::class, 'unbookSeatadmin']);

    Route::get('/get-all-bookings', [BookingController::class, 'getAllBookings']);


    Route::get('/set-service-charge', [ServicechargeController::class, 'showForm'])->name('service_charge.form');
    Route::post('/set-service-charge', [ServiceChargeController::class, 'store'])->name('service_charge.store');
    // Route::get('/set-service', [ServiceChargeController::class, 'getCharge'])->name('service_charge.getCharge');
    Route::get('/wallet-history/{userId}', [AdminController::class, 'getWalletHistory'])->name('wallet.history');
    Route::get('/wallet-history', [AdminController::class, 'WalletHistory']);


    Route::get('/userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
    Route::get('/loginstatus', [AdminController::class, 'loginstatus'])->name('admin.loginstatus');
    Route::get('/wallethistory', [AdminController::class, 'wallethistorypage'])->name('admin.wallethistory');
    Route::get('/commission', [AdminController::class, 'commission'])->name('admin.commission');
    Route::get('/servicecharge', [AdminController::class, 'servicecharge'])->name('admin.servicecharge');


    Route::get('/routes', [RouteController::class, 'index']); // Fetch all routes
    Route::get('/routes/{id}', [RouteController::class, 'edit']);
    Route::post('/routes', [RouteController::class, 'store']); // Add a new route
    Route::put('/routes/{id}', [RouteController::class, 'update']); // Update a route
    Route::delete('/routes/{id}', [RouteController::class, 'destroy']); // Delete a route

    Route::delete('/delete-booking/{id}', [BookingController::class, 'deleteBooking']);

    // In routes/web.php or routes/api.php
    Route::delete('/buses/{id}', [BusController::class, 'destroy'])->name('buses.destroy');


    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});
