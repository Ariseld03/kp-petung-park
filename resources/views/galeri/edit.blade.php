<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/galeriUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Perbarui Galeri</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Perbarui Galeri</h1>
        <form action="updateGaleri" method="post" enctype="multipart/form-data">
            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="Contoh Galeri" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto" name="foto">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required>Ini adalah deskripsi galeri.</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/galeri') }}'">Batal</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
