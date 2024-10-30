<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/staffDelete.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Hapus Staff</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-danger">Hapus Staff</h1>
        <p class="text-center">Apakah Anda yakin ingin menghapus staff berikut?</p>
        
        <!-- Detail Staff yang ingin dihapus -->
        <div class="staff-details p-3 border rounded bg-light">
            <p><strong>Email:</strong> staff1@example.com</p>
            <p><strong>Nama:</strong> Staff Satu</p>
            <p><strong>Password:</strong> password1</p>
            <p><strong>Tanggal Lahir:</strong> 1990-01-01</p>
            <p><strong>Nomor Telepon:</strong> 081234567890</p>
            <p><strong>Posisi:</strong> Admin</p>
            <p><strong>Jenis Kelamin:</strong> Pria</p>
            <p><strong>Status:</strong> Aktif</p>
            <p><strong>Create Date:</strong> 2023-01-01</p>
            <p><strong>Update Date:</strong> 2023-10-01</p>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-danger" onclick="location.href='{{ url('/staffShow') }}'">Ya, Hapus</button>
            <button class="btn btn-secondary" onclick="location.href='{{ url('/staffShow') }}'">Tidak, Kembali</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
