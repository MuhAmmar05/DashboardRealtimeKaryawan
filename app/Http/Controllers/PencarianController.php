<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\KaryawanExport; // Jika Anda menggunakan Maatwebsite Excel


class PencarianController extends Controller
{
    public function index(Request $request)
    {
        // Validasi input
        $request->validate([
            'searchQuery' => 'nullable|string|max:255'
        ]);

        // Ambil filter dari request
        $searchQuery = $request->get('searchQuery', '');
        $sort = $request->get('ddsort', 'NPK asc');
        $jabatan = $request->get('ddjabatan', '');
        $golongan = $request->get('ddgolongan', '');
        $page = $request->get('page', 1);
        $perPage = 10;

        // Panggil Stored Procedure
        $karyawan = DB::select('CALL dkw_getDataKaryawanDashboard(?, ?, ?, ?, ?)', [
            $page, $searchQuery, $sort, $jabatan, $golongan
        ]);

        // Convert the stdClass objects to arrays
        // $karyawan = collect($karyawan)->map(function ($item) {
        //     return (object) $item; // Convert each item to an object
        // });

        // $total = count($karyawan);
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
        return view('pencarian', compact('karyawan', 'searchQuery', 'sort', 'jabatan', 'golongan'));
    }
    public function exportExcel(Request $request)
    {
        $searchQuery = $request->get('searchQuery', '');
        $sort = $request->get('ddsort', 'NPK asc');
        $jabatan = $request->get('ddjabatan', '');
        $golongan = $request->get('ddgolongan', '');

        $query = DB::select('CALL dkw_getAllDataKaryawanDashboard(?, ?, ?, ?)', [
            $searchQuery, $sort, $jabatan, $golongan
        ]);

        return Excel::download(new KaryawanExport(collect($query)), 'KaryawanDashboard.xlsx');
    }
    public function exportToPDF(Request $request)
    {
        $searchQuery = $request->input('searchQuery', '');
        $sort = $request->input('ddsort', 'NPK asc');
        $jabatan = $request->input('ddjabatan', '');
        $golongan = $request->input('ddgolongan', '');

        // Ambil data dengan stored procedure
        $query = DB::select('CALL dkw_getAllDataKaryawanDashboard(?, ?, ?, ?)', [
            $searchQuery, $sort, $jabatan, $golongan
        ]);

        // Menggunakan dompdf untuk ekspor ke PDF
        $pdf = Pdf::loadView('pencarian.pdf', ['karyawan' => collect($query)]);

        // Mengunduh PDF
        return $pdf->download('KaryawanDashboard.pdf');
    }
//     public function exportExcel(Request $request)
//     {
//         $searchQuery = $request->get('searchQuery', '');
//         $sort = $request->get('ddsort', 'NPK asc');
//         $jabatan = $request->get('ddjabatan', '');
//         $golongan = $request->get('ddgolongan', '');

//         $karyawan = DB::select('CALL dkw_getAllDataKaryawanDashboard(?, ?, ?, ?)', [
//             $searchQuery ?: null, 
//             $sort, 
//             $jabatan ?: null, 
//             $golongan ?: null
//         ]);

//         $data = collect($karyawan)->map(function ($data) {
//             return (object) $data; // Ensure the data is an object and not an array
//         })->toArray();

//         return Excel::download(new class($data) implements FromArray, WithHeadings, ShouldAutoSize {
//             protected $data;

//             public function __construct(array $data) {
//                 $this->data = $data;
//             }

//             public function array(): array {
//                 return $this->data;
//             }

//             public function headings(): array {
//                 return [
//                     'No','NPK', 'Nama Karyawan', 'Tanggal Lahir', 'Usia', 'Kualifikasi',
//                     'Jenis Kelamin', 'Jabatan', 'Departemen' ,'Golongan', 'Tanggal Masuk Kerja', 'Jabatan Fungsional Dosen' ,'Lama Kerja'
//                 ];
//             }
//         }, 'data_karyawan.xlsx');
//     }

//     public function exportPDF(Request $request)
// {
//     $searchQuery = $request->get('searchQuery', '');
//     $sort = $request->get('ddsort', 'NPK asc');
//     $jabatan = $request->get('ddjabatan', '');
//     $golongan = $request->get('ddgolongan', '');

//     $karyawan = DB::select('CALL dkw_getAllDataKaryawanDashboard(?, ?, ?, ?)', [
//         $searchQuery ?: null, 
//         $sort, 
//         $jabatan ?: null, 
//         $golongan ?: null
//     ]);

//     // Add No property to the data
//     $karyawan = collect($karyawan)->map(function ($item, $index) {
//         $item->No = $index + 1;  // Add 'No' property for the row number
//         return $item;
//     });

//     // Ensure data is in the right format for the PDF export
//     $pdf = Pdf::loadView('pencarian', compact('karyawan'));
//     return $pdf->download('data_karyawan.pdf');
// }

}
