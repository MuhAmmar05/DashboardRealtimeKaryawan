<?php

namespace App\Imports;

use App\Models\FileSpreadsheet;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpreadsheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new FileSpreadsheet([
            'namaKaryawan'        => $row['nama_karyawan'], // Kolom pertama pada file Excel
            'usia'                => $row['usia'],
            'departemen'          => $row['departemen'],
            'jabatan'             => $row['jabatan'],
            'jenisKelamin'        => $row['jenis_kelamin'],
            'jenisKaryawan'       => $row['jenis_karyawan'],
            'kualifikasiKaryawan' => $row['kualifikasi_karyawan'],
            'jabatanFungsional'   => $row['jabatan_fungsional'],
            'createdBy'           => 1, // Mengambil user yang sedang login
            'status'              => 1,
        ]);
    }
}
