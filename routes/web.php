<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookVehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle');

    Route::get('/vehicles/booking/{id}', [BookVehicleController::class, 'index'])->name('book.vehicle');
    Route::post('/vehicles/booking', [BookVehicleController::class, 'store'])->name('book.store');
    Route::get('/vehicles/return/{id}', [BookVehicleController::class, 'update'])->name('return.vehicle');
    Route::post('/vehicles/return', [BookVehicleController::class, 'return'])->name('return.store');
});

// Users
Route::middleware('auth', 'verified', 'user')->group(function () {
    Route::get('/dashboard', [VehicleController::class, 'show'])->name('dashboard');
});

// Admin
Route::middleware('auth', 'verified', 'admin')->name('admin.')->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicles/store', [VehicleController::class, 'store'])->name('vehicle.store');
    Route::delete('/vehicles/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle.delete');
});

require __DIR__.'/auth.php';
