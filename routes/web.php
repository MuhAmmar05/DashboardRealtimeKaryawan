<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PencarianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\UploadExcelController;

Route::get('/', function () {
    return view('login');
});

// Route::get('/upload', function () {
//     return view('excel.upload');
// });

Route::get('/file-upload', [UploadExcelController::class, 'index']);
Route::post('/file-upload', [UploadExcelController::class, 'upload']);
Route::post('/upload', [SpreadsheetController::class, 'upload']);
Route::get('/chart', [SpreadsheetController::class, 'showChart']);
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('Dashboard.index');   
Route::get('/login', [DashboardController::class, 'login'])->name('Dashboard.login');   