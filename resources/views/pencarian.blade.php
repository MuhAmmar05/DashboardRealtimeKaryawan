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
{{-- <body style="background-color: white">
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
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="nav-link" href="/logout">
                    <i class="bi bi-box-arrow-left me-2"></i> Logout
                </a>
            </form>
    
            <a class="nav-link" href="/dashboard">
                <i class="bi bi-grid me-2"></i> Dashboard
            </a>
            <a class="nav-link" href="/pencarian">
                <i class="bi bi-search me-2"></i> Pencarian
            </a>
        </nav>
    </div>

    <div id="content" class="">
        <div class="container-fluid">
            <div class="row px-2">
                <div class="container mt-5">
                    <!-- Form Pencarian -->
                    <form action="{{ route('pencarian.index') }}" method="GET" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="text" name="keyword" class="form-control" placeholder="Cari Karyawan..." value="{{ old('keyword', $keyword ?? '') }}">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option value="[NPK] asc">NPK [↑]</option>
                                <option value="[NPK] desc">NPK [↓]</option>
                                <option value="[Usia] asc">Usia [↑]</option>
                                <option value="[Usia] desc">Usia [↓]</option>
                                <option value="[Tanggal Masuk Kerja] asc">Tanggal Masuk Kerja [↑]</option>
                                <option value="[Tanggal Masuk Kerja] desc">Tanggal Masuk Kerja [↓]</option>
                                <option value="[Golongan] asc">Golongan [↑]</option>
                                <option value="[Golongan] desc">Golongan [↓]</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option value="semua">-- Semua --</option>
                                <option value="Staff">Staff</option>
                                <option value="Kepala Seksi">Kepala Seksi</option>
                                <option value="Kepala Departemen">Kepala Departemen</option>
                                <option value="Wakil Direktur">Wakil Direktur</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Sekretaris Prodi">Sekretaris Prodi</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option value="semua">-- Semua --</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>                                <option value="1">Golongan</option>
                                <option value="ABS/Outsourcing">ABS/Outsourcing</option>
                                <option value="DOSEN LUAR">DOSEN LUAR</option>
                                <option value="MAGANG">MAGANG</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </form> --}}
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
            {{-- <form action="" method="GET" class="row g-3 mb-4"> --}}
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
            <div class="d-flex justify-content-center mt-4">
                {{ $karyawan->links('pagination::bootstrap-5') }}
            </div>
    
            <!-- Tombol Export -->
            <div class="d-flex flex-column">
                <div class="mb-3">
                    <button class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
                    <button class="btn btn-danger" onclick="exportToPDF()" style="margin-left: 5px">Export to PDF</button>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('hamburger').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const hamburger = document.getElementById('hamburger');
            const logo = document.getElementById('logo');

            sidebar.classList.toggle('active');
            content.classList.toggle('active');
            hamburger.classList.toggle('active');
            logo.classList.toggle('active');
        });
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
