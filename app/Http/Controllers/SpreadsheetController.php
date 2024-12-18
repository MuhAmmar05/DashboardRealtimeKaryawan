<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileSpreadsheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SpreadsheetImport; // Untuk import data dari Excel
use Illuminate\Support\Facades\Auth; // Untuk mengambil id user yang sedang login

class SpreadsheetController extends Controller
{
    // Fungsi untuk upload dan membaca file Excel
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Menggunakan Maatwebsite untuk memproses file Excel
        Excel::import(new SpreadsheetImport, $request->file('file'));

        return redirect()->back()->with('success', 'File berhasil diupload dan data disimpan!');
    }

    // Fungsi untuk menampilkan grafik Pie Chart usia
    public function showChart()
    {
        // Menghitung jumlah karyawan berdasarkan segmentasi usia
        $usiaCounts = [
            '< 22 Tahun'      => FileSpreadsheet::where('usia', '<', 22)->count(),
            '22 - 27 Tahun'   => FileSpreadsheet::whereBetween('usia', [22, 27])->count(),
            '28 - 33 Tahun'   => FileSpreadsheet::whereBetween('usia', [28, 33])->count(),
            '34 - 39 Tahun'   => FileSpreadsheet::whereBetween('usia', [34, 39])->count(),
            '40 - 45 Tahun'   => FileSpreadsheet::whereBetween('usia', [40, 45])->count(),
            '46 - 51 Tahun'   => FileSpreadsheet::whereBetween('usia', [46, 51])->count(),
            '> 51 Tahun'      => FileSpreadsheet::where('usia', '>', 51)->count(),
        ];

        return view('excel.chart', compact('usiaCounts'));
    }
}
