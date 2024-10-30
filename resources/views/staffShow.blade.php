<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staffShow.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Tabel Staff</title>
</head>
<body>
    <!-- Header Admin -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/staff') }}">Staff</a></li>
                <li><a href="{{ url('/galeri') }}">Galeri</a></li>
                <li><a href="{{ url('/menu') }}">Menu</a></li>
                <li><a href="{{ url('/wisata') }}">Wisata</a></li>
                <li><a href="{{ url('/kegiatan') }}">Kegiatan</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Tabel Staff</h1>
        <button id="addRowBtn" onclick="location.href='{{ url('/staffAdd') }}'">Tambah Staff</button>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Tanggal Lahir</th>
                    <th>Nomor Telepon</th>
                    <th>Posisi</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>staff1@example.com</td>
                    <td>Staff Satu</td>
                    <td>password1</td>
                    <td>1990-01-01</td>
                    <td>081234567890</td>
                    <td>Admin</td>
                    <td>Pria</td>
                    <td>Aktif</td>
                    <td>2023-01-01</td>
                    <td>2023-10-01</td>
                    <td><button class="update-btn" onclick="location.href='{{ url('/staffUpdate') }}'">Perbarui</button></td>
                    <td><button class="delete-btn" onclick="location.href='{{ url('/staffDelete') }}'">Hapus</button></td>
                </tr>
                <tr>
                    <td>staff2@example.com</td>
                    <td>Staff Dua</td>
                    <td>password2</td>
                    <td>1992-02-02</td>
                    <td>082345678901</td>
                    <td>Staff</td>
                    <td>Wanita</td>
                    <td>Non-Aktif</td>
                    <td>2023-02-01</td>
                    <td>2023-10-02</td>
                    <td><button class="update-btn" onclick="location.href='{{ url('/staffUpdate') }}'">Perbarui</button></td>
                    <td><button class="delete-btn" onclick="location.href='{{ url('/staffDelete') }}'">Hapus</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
