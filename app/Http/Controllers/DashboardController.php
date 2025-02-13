<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $counting = DB::select('CALL dkw_getDataCountingDashboardKaryawan()');
        $counting = collect($counting)->first();

        $departemen = DB::select('CALL dkw_getDataGrafikDepartemenDashboard()');
        $departemen = collect($departemen)->first();

        $gender = DB::select('CALL dkw_getDataGrafikGenderDashboard()');
        $gender = collect($gender)->first();

        $jabatan = DB::select('CALL dkw_getDataGrafikJabatanDashboard()');
        $jabatan = collect($jabatan)->first();

        $jafung = DB::select('CALL dkw_getDataGrafikJafungDashboard()');
        $jafung = collect($jafung)->first();

        $kualifikasi = DB::select('CALL dkw_getDataGrafikKualifikasiDashboard()');
        $kualifikasi = collect($kualifikasi)->first();

        $usia = DB::select('CALL dkw_getDataGrafikUsiaDashboard()');
        $usia = collect($usia)->first();


        $startDate = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');
        $kehadiranDepartemen = DB::select('CALL dkw_getPersentaseKehadiranByDepartemen(?,?)', [
            $startDate, $endDate
        ]);
        $kehadiranDepartemen = collect($kehadiranDepartemen);

        return view('dashboard', compact('counting', 'departemen', 'gender', 'jabatan', 'jafung', 'kualifikasi', 'usia', 'kehadiranDepartemen'));
        // return view('dashboard', compact('counting', 'departemen', 'gender', 'jafung', 'kualifikasi', 'usia', 'kehadiranDepartemen'));
    }
    public function login(Request $request)
    {
        // Tampilkan view
        return view('login');
    }
}
