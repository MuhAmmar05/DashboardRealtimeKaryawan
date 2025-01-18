<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Excel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Data dari File Excel: {{ $file_name }}</h2>

        @if(count($data) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach($data[0] as $header)
                            <th>{{ $header }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $row)
                        @if($index > 0) 
                            <tr>
                                @foreach($row as $cell)
                                    <td>{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-warning">Tidak ada data ditemukan!</p>
        @endif

        {{-- <a href="{{ route('upload.excel.form') }}" class="btn btn-primary mt-3">Kembali ke Upload</a> --}}
    </div>
</body>
</html>
