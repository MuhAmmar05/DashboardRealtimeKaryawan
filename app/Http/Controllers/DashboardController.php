<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Tampilkan view
        return view('dashboard');
    }
    public function pencarian(Request $request)
    {
        // Tampilkan view
        return view('pencarian');
    }
    public function login(Request $request)
    {
        // Tampilkan view
        return view('login');
    }
}
