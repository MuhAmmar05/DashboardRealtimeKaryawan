<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PencarianController;
use App\Models\User;
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

    $user = User::where('usr_id', $credentials['username'])->first();

    if ($user && $credentials['password'] === $user->usr_password) {
        Session::put('user', $user->usr_id);
        Session::put('role', $user->rol_id);
        return redirect('/dashboard')->with('message', 'Login berhasil!');
    }
    return back()->with('error', 'Username atau password salah!');
})->name('login.process');

// Logout
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login')->with('message', 'Anda telah logout.');
})->name('logout');

Route::get('/dashboard', function () {
    if (!Session::has('user')) {
        return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
    }
    return app(DashboardController::class)->index(request());
})->name('dashboard.index');

Route::get('/pencarian', function () {
    if (!Session::has('user')) {
        return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
    } else if (Session::get('role') != 'ROL01') {
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman pencarian.');
    }
    return app(PencarianController::class)->index(request());
})->name('pencarian.index');

Route::post('/dashboard/getKehadiran', [DashboardController::class, 'getKehadiran'])->name('dashboard.getKehadiran');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Route::get('/pencarian', [PencarianController::class, 'index'])->name('pencarian.index');