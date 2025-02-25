<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('offers')->group(function () {
        Route::get('', [OfferController::class, 'index'])->name('offers.index');
        Route::get('/create', [OfferController::class, 'create'])->name('offers.create');
        Route::post('/', [OfferController::class, 'store'])->name('offers.store');
        Route::get('/{offer}', [OfferController::class, 'show'])->name('offers.show');
    });
});

require __DIR__.'/auth.php';
