<?php
namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $role = Session::get('role');
        // Validasi input
        $request->validate([
            'searchQuery' => 'nullable|string|max:255'
        ]);

        // Ambil filter dari request
        $searchQuery = $request->get('searchQuery', '');
        $sort = $request->get('ddsort', 'NPK asc'); // Default sort
        $jabatan = $request->get('ddjabatan', ''); // Default order
        $golongan = $request->get('ddgolongan', ''); // Default order
        $page = $request->get('page', 1); // Jumlah data per halaman
        $perPage = 10;

        // Panggil Stored Procedure
        $karyawan = DB::select('CALL dkw_getDataKaryawanDashboard(?, ?, ?, ?, ?)', [
            $page, $searchQuery, $sort, $jabatan, $golongan
        ]);

        // Ubah hasil menjadi Collection agar bisa dipakai seperti Eloquent
        $karyawan = collect($karyawan);

        $total = $karyawan->first()->Count ?? 0;

        // Buat instance LengthAwarePaginator
        $karyawan = new LengthAwarePaginator($karyawan, $total, $perPage, $page, [
            'path' => $request->url(),
            'query' => $request->query(),
        ]);

        // Kirim data ke view
        return view('pencarian', compact('role', 'karyawan', 'searchQuery', 'sort', 'jabatan', 'golongan'));
    }
}
