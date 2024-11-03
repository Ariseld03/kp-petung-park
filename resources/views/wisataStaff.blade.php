<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Menambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/wisataStaff.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Daftar Wisata</title>
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
        <h1 class="text-center" style="color: #557C56;">Daftar Wisata</h1>
        <a href="{{ url('/wisataAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Wisata</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Wisata A</td>
                    <td>Deskripsi Wisata A</td>
                    <td>Aktif</td>
                    <td>01-01-2024</td>
                    <td>05-01-2024</td>
                    <td>
                        <button class="btn btn-primary" onclick="location.href='{{ url('/wisataUpdate') }}'">Perbarui</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="location.href='{{ url('/wisataDelete') }}'">Hapus</button>
                    </td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai data wisata -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
