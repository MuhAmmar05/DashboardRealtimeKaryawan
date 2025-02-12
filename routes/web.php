<?php

use App\Http\Controllers\PencarianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Route::get('/upload', function () {
//     return view('excel.upload');
// });

Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');

