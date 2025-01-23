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
        <form action="{{ route('pencarian.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-10">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Karyawan..." value="{{ old('keyword', $keyword ?? '') }}">
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
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Tanggal Masuk Kerja</th>
                        <th>Lama Kerja</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($karyawan as $index => $data)
                        <tr>
                            <td>{{ $karyawan->firstItem() + $index }}</td>
                            <td>{{ $data->kry_id }}</td>
                            <td>{{ $data->kry_nama_depan }} {{ $data->kry_nama_blkg }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->kry_tgl_lahir)->format('d-m-Y') }}</td>
                            <td>{{ round(\Carbon\Carbon::parse($data->kry_tgl_lahir)->age) }}</td>
                            <td>{{ $data->kry_jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $data->jabatanUtama->jab_desc ?? 'Tidak Ada' }} - {{ $data->jabatanSekunder->jab_desc ?? 'Tidak Ada' }}</td>
                            <td>{{ $data->golongan->gol_desc ?? 'Tidak Ada' }}</td>
                            <td>{{ \Carbon\Carbon::parse($data->kry_tgl_masuk_kerja)->format('d-m-Y') }}</td>
                            <td>{{ round(\Carbon\Carbon::parse($data->kry_tgl_masuk_kerja)->diffInYears(\Carbon\Carbon::now())) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data karyawan ditemukan.</td>
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
