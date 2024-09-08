<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petung Park</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk styling yang tidak ada di Bootstrap */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }

        .title-section {
            background-image: url('/images/beranda/berandaPetungPark.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 8%;
        }
        .title {
            font-size: 8vw;
            font-weight: bold;
        }
        .description {
            font-size: 2vw;
        }

        .denah-image {
            max-width: 100%; 
            height: auto;
        }

        .galeri-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        footer {
            background-color: #333;
            color: white;
        }

        /* Kelas Kustom untuk Galeri */
        .bg-custom {
            background-color: #295A3F;
        }

        /* Kelas Kustom untuk Lokasi */
        .bg-location {
            background-color: #A1D0B3;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #295A3F;">
        <div class="container">
            <a class="navbar-brand" href="#">Petung Park</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-outline-light ml-auto">Login</button>
        </div>
    </nav>

    <!-- Bagian Judul -->
    <div class="title-section">
        <h1 class="title">Petung Park</h1>
        <p class="description">Deskripsi</p>
    </div>

    <!-- Bagian Sejarah -->
    <section class="bg-success text-white text-center py-5">
        <div class="container">
            <h2 class="h2">Sejarah</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p>Dolor sit possimus cumque eos expedita ratione recusandae nisi tenetur non alias, neque velit sint ducimus.</p>
            <p>Illo architecto corporis molestias commodi error.</p>
        </div>
    </section>

    <!-- Bagian Lokasi -->
    <section class="bg-location text-dark text-center py-5">
        <div class="container">
            <h2 class="h2">Lokasi Petung Park</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <img src="/images/beranda/lokasi/lokasiImage.jpg" alt="Lokasi Petung Park" class="img-fluid">
                </div>
                <div class="col-md-4 text-left">
                    <p>Alamat</p>
                    <p>No Telepon</p>
                    <p>Jam Buka - Tutup</p>
                </div>
            </div>
            <h2 class="h2 mt-5">Denah Petung Park</h2>
            <div class="mt-4">
                <img src="/images/beranda/lokasi/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
            </div>
        </div>
    </section>

    <!-- Bagian Galeri -->
    <section class="bg-custom text-white text-center py-5">
        <div class="container">
            <h2 class="h2">Galeri</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <div class="bg-white p-3">
                        <img src="/images/beranda/galeri/foto1.jpg" alt="Foto 1" class="galeri-image">
                        <p class="text-dark mt-2">Teks Foto 1</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-white p-3">
                        <img src="/images/beranda/galeri/foto2.jpg" alt="Foto 2" class="galeri-image">
                        <p class="text-dark mt-2">Teks Foto 2</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-white p-3">
                        <img src="/images/beranda/galeri/foto3.jpg" alt="Foto 3" class="galeri-image">
                        <p class="text-dark mt-2">Teks Foto 3</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-3">
        <div class="container">
            <p>Kontak</p>
        </div>
    </footer>

    <!-- Link Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
