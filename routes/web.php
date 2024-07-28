<?php

use App\Http\Controllers\DashboradController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DashboradController::class,'index']);





Route::middleware('auth')->group(function () {
    // AUTH ==================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('avatar.update');

    // TICKETS ==================
    Route::get('/dashboard', [TicketController::class,'index'])->middleware(['verified'])->name('dashboard');
    Route::resource('ticket',TicketController::class);
});

require __DIR__.'/auth.php';
