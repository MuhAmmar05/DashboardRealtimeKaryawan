<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PencarianController;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\UploadExcelController;
use App\Models\sso_msuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

// Halaman Login
Route::get('/login', function () {
    if (Session::has('user')) {
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

// Proses Login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = sso_msuser::where('usr_id', $credentials['username'])->first();

    if ($user && $credentials['password'] === $user->usr_password) {
        Session::put('user', $user->usr_id);
        return redirect('/dashboard')->with('message', 'Login berhasil!');
    }    
    return back()->with('error', 'Username atau password salah!');
})->name('login.process');

// Logout
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login')->with('message', 'Anda telah logout.');
})->name('logout');

// Proteksi Dashboard dengan Session (Tanpa Middleware)
Route::get('/dashboard', function () {
    if (!Session::has('user')) {
        return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
    }
    return view('dashboard');
})->name('Dashboard.index');

// Rute lainnya
Route::get('/file-upload', [UploadExcelController::class, 'index']);
Route::post('/file-upload', [UploadExcelController::class, 'upload']);
Route::post('/upload', [SpreadsheetController::class, 'upload']);
Route::get('/chart', [SpreadsheetController::class, 'showChart']);
Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');