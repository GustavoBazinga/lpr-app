<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AccessController;

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

    Route::get('/parking/search', [ParkingController::class, 'search'])->name('parking.search');
    Route::post('/parking/find', [ParkingController::class, 'show'])->name('parking.show');
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::get('/accesses/{time}', [AccessController::class, 'findAccessByTime'])->name('accesses.findAccessByTime');
    Route::get('/accesses', [AccessController::class, 'index'])->name('accesses.index');
});

require __DIR__.'/auth.php';
