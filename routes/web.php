<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PencarianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Route::get('/upload', function () {
//     return view('excel.upload');
// });

Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');   
Route::get('/login', [DashboardController::class, 'login'])->name('Dashboard.login');   