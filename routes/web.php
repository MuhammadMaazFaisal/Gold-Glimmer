<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Vendor Management
    Route::get('/manufacturer', [VendorController::class, 'create'])->name('manufacturer');
    Route::get('/polisher', [VendorController::class, 'create'])->name('polisher');
    Route::get('/stone-setter', [VendorController::class, 'create'])->name('stone-setter');
    Route::get('/vendor', [VendorController::class, 'create'])->name('vendor');

    Route::post('/vendor-list', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('/vendor/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
    Route::post('/vendor', [VendorController::class, 'store'])->name('vendor.store');
    Route::post('/vendor/{id}', [VendorController::class, 'update'])->name('vendor.update');
    Route::delete('/vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');
    Route::post('/next-vendor-number', [VendorController::class, 'getNextVendorNumber'])->name('next-vendor-number');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});



require __DIR__.'/auth.php';
