<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File Excel dengan Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Upload dan Preview File Excel</h2>

        {{-- Form Upload --}}
        <form action="{{ url('file-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="excel_file" class="form-label">Upload File Excel</label>
                <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xls,.xlsx,.csv" required onchange="previewExcel(event)">
            </div>
            {{-- Tabel Preview --}}
            <h3 class="mt-5">Preview Data</h3>
            <table id="previewTable" class="table table-bordered mt-3">
                <thead>
                    <tr id="tableHead"></tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
            <button type="submit" class="btn btn-primary mt-3">Upload & Simpan</button>
        </form>

    </div>

    {{-- JavaScript untuk Preview File --}}
    <script>
        function previewExcel(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                const data = new Uint8Array(e.target.result);
                const workbook = XLSX.read(data, { type: 'array' });
                const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
                const sheetData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

                // Menampilkan header pada tabel
                const tableHead = document.getElementById('tableHead');
                tableHead.innerHTML = "";
                sheetData[0].forEach(header => {
                    const th = document.createElement('th');
                    th.textContent = header;
                    tableHead.appendChild(th);
                });

                // Menampilkan data pada tabel
                const tableBody = document.getElementById('tableBody');
                tableBody.innerHTML = "";
                sheetData.slice(1).forEach(row => {
                    const tr = document.createElement('tr');
                    row.forEach(cell => {
                        const td = document.createElement('td');
                        td.textContent = cell;
                        tr.appendChild(td);
                    });
                    tableBody.appendChild(tr);
                });
            };

            reader.readAsArrayBuffer(file);
        }
    </script>

</body>
</html>
