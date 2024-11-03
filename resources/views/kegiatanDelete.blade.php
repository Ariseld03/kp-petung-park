<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/kegiatanDelete.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Hapus Kegiatan</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-danger">Hapus Kegiatan</h1>
        <p class="text-center">Apakah Anda yakin ingin menghapus kegiatan berikut?</p>
        
        <!-- Detail Kegiatan yang ingin dihapus -->
        <div class="kegiatan-details p-3 border rounded bg-light">
            <p><strong>Nama Kegiatan:</strong> Kegiatan Contoh</p>
            <p><strong>Lokasi:</strong> Lokasi Contoh</p>
            <p><strong>Deskripsi:</strong> Ini adalah deskripsi kegiatan.</p> <!-- Tambahkan deskripsi jika perlu -->
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-danger" onclick="location.href='{{ url('/kegiatan') }}'">Ya, Hapus</button>
            <button class="btn btn-secondary" onclick="location.href='{{ url('/kegiatan') }}'">Tidak, Kembali</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
