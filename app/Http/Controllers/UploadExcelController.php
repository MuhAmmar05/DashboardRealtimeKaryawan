<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileSpreadsheet;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use Carbon\Carbon;

class UploadExcelController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Menyimpan file di storage
        $file = $request->file('excel_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('excel_files', $fileName, 'public');

        // Menyimpan data ke dalam tabel
        $fileSpreadsheet = FileSpreadsheet::create([
            'fsp_namaFile'    => $fileName,
            'fsp_status'      => 'Aktif',
            'fsp_created_by'  => 'Admin',
            'fsp_created_date'=> Carbon::now()
        ]);

        // Membaca data untuk ditampilkan pada tabel preview
        $data = Excel::toArray(new ExcelImport, $file);

        return view('file-upload', ['data' => $data[0], 'file_name' => $fileName]);
    }

    public function showData()
    {
        // Menggunakan kolom fsp_created_date sebagai pengganti created_at
        $file = FileSpreadsheet::where('fsp_status', 'Aktif')
            ->orderBy('fsp_created_date', 'desc')
            ->first();

        if (!$file) {
            return view('file-data')->with('data', [])->with('file_name', 'Tidak ada file aktif');
        }

        $path = storage_path('app/public/excel_files/' . $file->fsp_namaFile);
        $data = Excel::toArray(new ExcelImport, $path);

        return view('file-data', [
            'data' => $data[0],
            'file_name' => $file->fsp_namaFile
        ]);
    }

}
