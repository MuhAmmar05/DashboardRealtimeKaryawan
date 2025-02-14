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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/js/app.js">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <span class="hamburger text-black" id="hamburger">&#9776;</span>
            <img src="/assets/astratech.png" alt="Logo" class="logo" id="logo">
        </div>
    </nav> 

    <!-- Sidebar -->
    <div id="sidebar" class="samping">
        <nav class="nav flex-column p-3">
            <a class="nav-link" href="/logout">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-grid me-2"></i> Dashboard
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-search me-2"></i> Pencarian
            </a>
        </nav>
    </div>

    <div id="content" class="">
        <div class="container mt-5">
            <h1 class="mb-4 text-center">Pencarian Karyawan</h1>

            <!-- Form Pencarian -->
            <form action="{{ route('pencarian.index') }}" method="GET" class="row g-3 mb-4">
                <div class="col-md-10">
                    <input type="text" name="searchQuery" class="form-control" placeholder="Cari Karyawan..." value="{{ old('searchQuery', $searchQuery ?? '') }}">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> </button>
                </div>
                <div class="col-md-1">
                    <button
                        type="button"
                        class="btn btn-primary dropdown-toggle px-4 border-start"
                        title="Saring atau Urutkan Data"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="outside"
                    >
                        <i class="bi bi-funnel"></i>
                    </button>
                    <div class="dropdown-menu p-4" style="width: 350px">
                        <div class="mb-3">
                            <label for="ddsort" class="form-label fw-bold">Urut Berdasarkan</label>
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

                        <div class="mb-3">
                            <label for="ddjabatan" class="form-label fw-bold">Jabatan</label>
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

                        <div class="mb-3">
                            <label for="ddgolongan" class="form-label fw-bold">Golongan</label>
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
                    </div>
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
                        @forelse($karyawan as $index =>$data)
                            <tr>
                                <td>{{ $data->No }}</td>
                                <td>{{ $data->NPK }}</td>
                                <td>{{ $data->{'Nama Karyawan'} }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->{'Tanggal Lahir'})->format('d-m-Y') }}</td>
                                <td>{{ $data->{'Usia'} }}</td>
                                <td>{{ $data->Kualifikasi }}</td>
                                <td>{{ $data->{'Jenis Kelamin'} }}</td>
                                <td>{{ $data->{'Jabatan'} }}</td>
                                <td>{{ $data->{'Departemen'} }}</td>
                                <td>{{ $data->{'Golongan'} }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->{'Tanggal Masuk Kerja'})->format('d-m-Y') }}</td>
                                <td>{{ $data->{'Jabatan Fungsional Dosen'} }}</td>
                                <td>{{ $data->{'Lama Kerja'} }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="13">Data tidak ditemukan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Button Export -->
            <div class="d-flex justify-content-end mt-3">
                <button id="exportExcelBtn" class="btn btn-success me-2">Export ke Excel</button>
                <button id="exportPdfBtn" class="btn btn-danger">Export ke PDF</button>
            </div>
        </div>
    </div>

    <script>
        // Export to Excel
        document.getElementById('exportExcelBtn').addEventListener('click', function () {
            var workbook = new ExcelJS.Workbook();
            var worksheet = workbook.addWorksheet('Data Karyawan');

            worksheet.columns = [
                { header: 'No', key: 'No', width: 10 },
                { header: 'NPK', key: 'NPK', width: 20 },
                { header: 'Nama Karyawan', key: 'NamaKaryawan', width: 30 },
                { header: 'Tanggal Lahir', key: 'TanggalLahir', width: 20 },
                { header: 'Usia', key: 'Usia', width: 10 },
                { header: 'Kualifikasi', key: 'Kualifikasi', width: 20 },
                { header: 'Jenis Kelamin', key: 'JenisKelamin', width: 20 },
                { header: 'Jabatan', key: 'Jabatan', width: 40 },
                { header: 'Departemen', key: 'Departemen', width: 80 },
                { header: 'Golongan', key: 'Golongan', width: 10 },
                { header: 'Tanggal Masuk Kerja', key: 'TanggalMasukKerja', width: 20 },
                { header: 'Jabatan Fungsional Dosen', key: 'JabatanFungsionalDosen', width: 30 },
                { header: 'Lama Kerja', key: 'LamaKerja', width: 15 }
            ];

            let rows = [];
            @foreach($karyawan as $data)
                rows.push({
                    No: '{{ $data->No }}',
                    NPK: '{{ $data->NPK }}',
                    NamaKaryawan: '{{ $data->{'Nama Karyawan'} }}',
                    TanggalLahir: '{{ \Carbon\Carbon::parse($data->{'Tanggal Lahir'})->format('d-m-Y') }}',
                    Usia: '{{ $data->{'Usia'} }}',
                    Kualifikasi: '{{ $data->Kualifikasi }}',
                    JenisKelamin: '{{ $data->{'Jenis Kelamin'} }}',
                    Jabatan: '{{ $data->{'Jabatan'} }}',
                    Departemen: '{{ $data->{'Departemen'} }}',
                    Golongan: '{{ $data->{'Golongan'} }}',
                    TanggalMasukKerja: '{{ \Carbon\Carbon::parse($data->{'Tanggal Masuk Kerja'})->format('d-m-Y') }}',
                    JabatanFungsionalDosen: '{{ $data->{'Jabatan Fungsional Dosen'} }}',
                    LamaKerja: '{{ $data->{'Lama Kerja'} }}'
                });
            @endforeach

            worksheet.addRows(rows);
            // Membuat header menjadi bold
            worksheet.getRow(1).font = { bold: true };

            // Membuat tabel dari data yang sudah ada
            worksheet.addTable({
                name: 'DataKaryawanTable',
                ref: 'A1',
                columns: worksheet.columns.map(col => ({ name: col.header })),
                rows: rows.map(row => Object.values(row))
            });

            workbook.xlsx.writeBuffer().then(function (buffer) {
                var blob = new Blob([buffer], { type: 'application/octet-stream' });
                saveAs(blob, 'Data_Karyawan.xlsx');
            });
        });

        // Export ke PDF
        document.getElementById('exportPdfBtn').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape');

            // Mendefinisikan header dan baris tabel
            let tableHeaders = ['No', 'NPK', 'Nama Karyawan', 'Tanggal Lahir', 'Usia', 'Kualifikasi', 'Jenis Kelamin', 'Jabatan', 'Departemen', 'Golongan', 'Tanggal Masuk Kerja', 'Jabatan Fungsional Dosen', 'Lama Kerja'];
            let tableRows = [];

            // Mengambil baris-baris tabel dan memasukkan ke dalam array
            document.querySelectorAll('#karyawanTable tbody tr').forEach(function (row) {
                let rowData = [];
                row.querySelectorAll('td').forEach(function (cell) {
                    rowData.push(cell.textContent);
                });
                tableRows.push(rowData);
            });

            // Menambahkan plugin auto-table untuk menghasilkan tabel dalam PDF
            doc.autoTable({
                head: [tableHeaders],       // Header tabel
                body: tableRows,           // Data tabel
                startY: 30,                // Mulai dari posisi vertikal 30
                theme: 'striped',          // Tema tabel (striped)
                headStyles: { fillColor: [22, 160, 133] }, // Warna latar belakang header
                margin: { top: 10 },       // Margin atas
            });

            // Menyimpan PDF yang dihasilkan dengan nama 'Data_Karyawan.pdf'
            doc.save('Data_Karyawan.pdf');
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
