<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Menambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Galeri</title>
</head>
<body>
    <!-- Header Admin -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #557C56;">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/staffShow') }}">Staff</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/wisataStaff') }}">Wisata</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/kegiatan') }}">Kegiatan</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Galeri</h1>
        <a href="{{ url('/galeriAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Foto</a>
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Banyak Like</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data galeri, dapat diulang sesuai kebutuhan -->
                <tr>
                    <td>Contoh Galeri 1</td>
                    <td><img src="link_foto1.jpg" alt="Foto Galeri 1" style="max-width: 100px;"></td>
                    <td>Deskripsi singkat tentang Galeri 1</td>
                    <td>Aktif</td>
                    <td>120</td>
                    <td>2023-01-01</td>
                    <td>2023-10-01</td>
                    <td>
                        <a href="{{ url('/galeriUpdate') }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td><a href="{{ url('/galeriDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai data galeri -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
