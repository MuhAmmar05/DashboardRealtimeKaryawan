<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.3.0/exceljs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Pencarian Karyawan</h1>

        <!-- Form Pencarian -->
        {{-- <form action="{{ route('pencarian.index') }}" method="GET" class="row g-3 mb-4"> --}}
        <form action="" method="GET" class="row g-3 mb-4">
            <div class="col-md-2">
                <input type="text" name="searchQuery" class="form-control" placeholder="Cari Karyawan..." value="{{ old('searchQuery', $searchQuery ?? '') }}">
            </div>
            <div class="col-md-2">
                <select name="ddsort" class="form-select">
                    <option value="NPK asc" @selected(old('ddsort', $sort ?? '') == 'NPK asc')>NPK [↑]</option>
                    <option value="NPK desc" @selected(old('ddsort', $sort ?? '') == 'NPK desc')>NPK [↓]</option>
                    <option value="Usia asc" @selected(old('ddsort', $sort ?? '') == 'Usia asc')>Usia [↑]</option>
                    <option value="Usia desc" @selected(old('ddsort', $sort ?? '') == 'Usia desc')>Usia [↓]</option>
                    <option value="Tanggal Masuk Kerja asc" @selected(old('ddsort', $sort ?? '') == 'Tanggal Masuk Kerja asc')>Tanggal Masuk Kerja [↑]</option>
                    <option value="Tanggal Masuk Kerja desc" @selected(old('ddsort', $sort ?? '') == 'Tanggal Masuk Kerja desc')>Tanggal Masuk Kerja [↓]</option>
                    <option value="Golongan asc" @selected(old('ddsort', $sort ?? '') == 'Golongan asc')>Golongan [↑]</option>
                    <option value="Golongan desc" @selected(old('ddsort', $sort ?? '') == 'Golongan desc')>Golongan [↓]</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="ddjabatan" class="form-select">
                    <option value="">-- Semua --</option>
                    <option value="Staff" @selected(old('ddjabatan', $jabatan ?? '') == 'Staff')>Staff</option>
                    <option value="Kepala Seksi" @selected(old('ddjabatan', $jabatan ?? '') == 'Kepala Seksi')>Kepala Seksi</option>
                    <option value="Kepala Departemen" @selected(old('ddjabatan', $jabatan ?? '') == 'Kepala Departemen')>Kepala Departemen</option>
                    <option value="Wakil Direktur" @selected(old('ddjabatan', $jabatan ?? '') == 'Wakil Direktur')>Wakil Direktur</option>
                    <option value="Direktur" @selected(old('ddjabatan', $jabatan ?? '') == 'Direktur')>Direktur</option>
                    <option value="Sekretaris Prodi" @selected(old('ddjabatan', $jabatan ?? '') == 'Sekretaris Prodi')>Sekretaris Prodi</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="ddgolongan" class="form-select">
                    <option value="">-- Semua --</option>
                    <option value="II" @selected(old('ddgolongan', $golongan ?? '') == 'II')>II</option>
                    <option value="III" @selected(old('ddgolongan', $golongan ?? '') == 'III')>III</option>
                    <option value="IV" @selected(old('ddgolongan', $golongan ?? '') == 'IV')>IV</option>
                    <option value="V" @selected(old('ddgolongan', $golongan ?? '') == 'V')>V</option>
                    <option value="ABS/Outsourcing" @selected(old('ddgolongan', $golongan ?? '') == 'ABS/Outsourcing')>ABS/ Outsourcing</option>
                    <option value="DOSEN LUAR" @selected(old('ddgolongan', $golongan ?? '') == 'DOSEN LUAR')>Dosen Luar</option>
                    <option value="MAGANG" @selected(old('ddgolongan', $golongan ?? '') == 'MAGANG')>Magang</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </form>

        <!-- Tabel Hasil Pencarian -->
        <div class="table-responsive">
            <table id="karyawanTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>NPK</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Lahir</th>
                        <th>Usia</th>
                        <th>Kualifikasi</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Golongan</th>
                        <th>Tanggal Masuk Kerja</th>
                        <th>Jabatan Fungsional Dosen</th>
                        <th>Lama Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawan as $index => $data)
                        <tr>
                            <td>{{ $data->No }}</td>
                            <td>{{ $data->NPK }}</td>
                            <td>{{ $data->{'Nama Karyawan'} }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->{'Tanggal Lahir'})->format('d-m-Y') }}</td>
                            <td>{{ $data->{'Usia'} }}</td>
                            <td>{{ $data->Kualifikasi }}</td>
                            <td>{{ $data->{'Jenis Kelamin'} }}</td>
                            <td>{{ $data->Jabatan }}</td>
                            <td>{{ $data->Departemen }}</td>
                            <td>{{ $data->Golongan }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->{'Tanggal Masuk Kerja'})->format('d-m-Y') }}</td>
                            <td>{{ $data->{'Jabatan Fungsional Dosen'} }}</td>
                            <td>{{ $data->{'Lama Kerja'} }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">Tidak ada data karyawan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $karyawan->links('pagination::bootstrap-5') }}
        </div> --}}

        <!-- Tombol Export -->
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
            <button class="btn btn-danger" onclick="exportToPDF()">Export to PDF</button>
        </div>

    </div>

    <script>
        async function exportToExcel() {
            const workbook = new ExcelJS.Workbook();
            const worksheet = workbook.addWorksheet('Karyawan');

            // Menambahkan header
            worksheet.columns = [
                { header: 'No', key: 'no', width: 5 },
                { header: 'NPK', key: 'npk', width: 10 },
                { header: 'Nama Karyawan', key: 'nama', width: 25 },
                { header: 'Tanggal Lahir', key: 'tgl_lahir', width: 15 },
                { header: 'Usia', key: 'usia', width: 10 },
                { header: 'Jenis Kelamin', key: 'jk', width: 15 },
                { header: 'Jabatan', key: 'jabatan', width: 38 },
                { header: 'Golongan', key: 'golongan', width: 10 },
                { header: 'Tanggal Masuk Kerja', key: 'tgl_masuk', width: 20 },
                { header: 'Lama Kerja', key: 'lama_kerja', width: 15 },
            ];

            // Menambahkan data
            document.querySelectorAll('#karyawanTable tbody tr').forEach((row, index) => {
                const cells = row.querySelectorAll('td');
                worksheet.addRow({
                    no: cells[0].innerText,
                    npk: cells[1].innerText,
                    nama: cells[2].innerText,
                    tgl_lahir: cells[3].innerText,
                    usia: cells[4].innerText,
                    jk: cells[5].innerText,
                    jabatan: cells[6].innerText,
                    golongan: cells[7].innerText,
                    tgl_masuk: cells[8].innerText,
                    lama_kerja: cells[9].innerText,
                });
            });

            // Styling header
            worksheet.getRow(1).font = { bold: true };
            worksheet.getRow(1).alignment = { horizontal: 'center' };

            // Mengunduh file
            const buffer = await workbook.xlsx.writeBuffer();
            saveAs(new Blob([buffer]), 'data_karyawan.xlsx');
        }

        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.autoTable({
                html: '#karyawanTable',
                theme: 'grid',
                styles: {
                    fontSize: 8,
                    cellPadding: 2
                },
                headStyles: {
                    fillColor: [0, 0, 0]
                }
            });
            doc.save('data_karyawan.pdf');
        }
    </script>
</body>
</html>
