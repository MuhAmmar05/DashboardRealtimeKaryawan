<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $role = Session::get('role');

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

        $startDateDefault = Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d');
        $endDateDefault = Carbon::now()->format('Y-m-d');
        $kehadiran = DB::select('CALL dkw_getPersentaseKehadiranByDepartemen(?,?)', [
            $startDateDefault, $endDateDefault
        ]);
        $kehadiran = collect($kehadiran);
        
        return view('dashboard', compact('role', 'counting', 'departemen', 'gender', 'jabatan', 'jafung', 'kualifikasi', 'usia', 'kehadiran'));
    }

    public function getKehadiran(Request $request)
    {
        $request->validate([
            'dtTanggalMulai' => 'required|date|before_or_equal:today|after_or_equal:' . Carbon::now()->subYear()->format('Y-m-d'),
            'dtTanggalAkhir' => 'required|date|before_or_equal:today|after_or_equal:dtTanggalMulai',
        ]);
        $periode = $request->get('filterPeriodeKehadiran', 0);
        
        if ($periode == 0) {
            $startDate = $request->get('dtTanggalMulai');
            $endDate = $request->get('dtTanggalAkhir');
            
            $kehadiran = DB::select('CALL dkw_getPersentaseKehadiranByDepartemen(?,?)', [
                $startDate, $endDate
            ]);
            $kehadiran = collect($kehadiran);
        }else if ($periode == 3) {
            $startDate = $request->get('dtTanggalMulai');
            $endDate = $request->get('dtTanggalAkhir');
            $kehadiran = DB::select('CALL dkw_getPersentaseKehadiranHarian(?,?)', [
                $startDate, $endDate
            ]);
            $kehadiran = collect($kehadiran);
        }else {
            $startDate = $request->get('dtTanggalMulai');
            $endDate = $request->get('dtTanggalAkhir');
            $kehadiran = DB::select('CALL dkw_getPersentaseKehadiranByPeriode(?,?,?)', [
                $startDate, $endDate, $periode
            ]);
            $kehadiran = collect($kehadiran);
        }

        return response()->json($kehadiran);
    }
}
