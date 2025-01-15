<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\UploadExcelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('excel.upload');
});

Route::get('/file-upload', [UploadExcelController::class, 'index']);
Route::post('/file-upload', [UploadExcelController::class, 'upload']);
Route::post('/upload', [SpreadsheetController::class, 'upload']);
Route::get('/chart', [SpreadsheetController::class, 'showChart']);
