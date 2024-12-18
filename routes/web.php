<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpreadsheetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('excel.upload');
});

Route::post('/upload', [SpreadsheetController::class, 'upload']);
Route::get('/chart', [SpreadsheetController::class, 'showChart']);
