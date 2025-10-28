<?php

use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('pelatihans', PelatihanController::class);

