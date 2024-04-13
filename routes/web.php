<?php

use App\Http\Controllers\CashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Vendor Management
    Route::get('manufacturer', [VendorController::class, 'create'])->name('manufacturer');
    Route::get('polisher', [VendorController::class, 'create'])->name('polisher');
    Route::get('stone-setter', [VendorController::class, 'create'])->name('stone-setter');
    Route::get('vendor', [VendorController::class, 'create'])->name('vendor');

    Route::post('vendor-list', [VendorController::class, 'index'])->name('vendor.index');
    Route::get('vendor/{id}', [VendorController::class, 'edit'])->name('vendor.edit');
    Route::post('vendor', [VendorController::class, 'store'])->name('vendor.store');
    Route::post('vendor/{id}', [VendorController::class, 'update'])->name('vendor.update');
    Route::delete('vendor/{id}', [VendorController::class, 'destroy'])->name('vendor.destroy');
    Route::get('next-vendor-number', [VendorController::class, 'getNextVendorNumber'])->name('next-vendor-number');

    // Metal Management
    Route::get('metal-list', [MetalController::class, 'index'])->name('metal.index');
    Route::get('issue-metal', [MetalController::class, 'create'])->name('issue.metal');
    Route::get('receive-metal', [MetalController::class, 'create'])->name('receive.metal');
    Route::post('get-metal-vendors', [MetalController::class, 'getMetalVendors'])->name('metal.vendors');
    Route::get('metal/{id}', [MetalController::class, 'edit'])->name('metal.edit');
    Route::post('metal', [MetalController::class, 'store'])->name('metal.store');
    Route::post('metal/{id}', [MetalController::class, 'update'])->name('metal.update');
    Route::delete('metal/{id}', [MetalController::class, 'destroy'])->name('metal.destroy');

    // Cash Management
    Route::get('cash-list', [CashController::class, 'index'])->name('cash.index');
    Route::get('issue-cash', [CashController::class, 'create'])->name('issue.cash');
    Route::get('receive-cash', [CashController::class, 'create'])->name('receive.cash');
    Route::post('get-cash-vendors', [CashController::class, 'getcashVendors'])->name('cash.vendors');
    Route::get('cash/{id}', [CashController::class, 'edit'])->name('cash.edit');
    Route::post('cash', [CashController::class, 'store'])->name('cash.store');
    Route::post('cash/{id}', [CashController::class, 'update'])->name('cash.update');
    Route::delete('cash/{id}', [CashController::class, 'destroy'])->name('cash.destroy');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); 
});



require __DIR__.'/auth.php';

