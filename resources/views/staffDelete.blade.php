<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staffDelete.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Hapus Staff</title>
</head>
<body>
    <div class="container">
        <h1>Hapus Staff</h1>
        <p>Apakah Anda yakin ingin menghapus staff berikut?</p>
        
        <!-- Detail Staff yang ingin dihapus -->
        <div class="staff-details">
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

        <button class="btn-hapus" onclick="location.href='{{ url('/staffShow') }}'">Ya, Hapus</button>
    <button class="btn-kembali" onclick="location.href='{{ url('/staffShow') }}'">Tidak, Kembali</button>

    </div>
</body>
</html>
