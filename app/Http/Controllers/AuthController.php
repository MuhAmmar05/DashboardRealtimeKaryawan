<?php

namespace App\Http\Controllers;

use App\Models\sso_msuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Tambahkan model

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        // Jika sudah login, langsung arahkan ke dashboard
        if (Session::has('user')) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan username (usr_id)
        $user = User::where('usr_id', $credentials['username'])->first();
        $password = User::where('usr_password', $credentials['password'])->first();

        // Periksa apakah user ditemukan dan password cocok
        if ($user && $password) {
            // Simpan session
            Session::put('user', $user->usr_id);
            return redirect('/dashboard')->with('message', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // Logout: Hapus session dan redirect ke login
    public function logout()
    {
        Session::forget('user');
        return redirect('/login')->with('message', 'Anda telah logout.');
    }
}