<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File Excel</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Pilih File Excel:</label>
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
