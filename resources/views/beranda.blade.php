<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda Petung Park</title>
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

        /* Kelas Kustom untuk Galeri */
        .frame-image {
            padding-top: 20px; 
            padding-left: 20px; 
            padding-right: 20px;
            padding-bottom: 55px; 
            background-color: white; 
            box-sizing: border-box;
            height: 250px; 
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .galeri-image {
            padding-top: 20px;
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .text-image {
            color: #295A3F; 
            font-size: 14px;
            text-align: center;
            font-weight: bold;
            margin-top: 10px; 
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

        /* Styling footer */
        .footer {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            color: white;
            position: relative;
        }

        .footer .logo-instansi {
            margin: 10px;
            width: 100px;
            height: 100px;
        }

        .footer .alamat {
            margin-left: 40px;
            display: flex;
            flex-direction: column;
        }

        .footer .alamat p {
            margin: 5px 0;
        }

        .footer .alamat img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }

        .footer .tautan {
            margin-left: 90px;
            text-align: left;
            
        }

        .footer .tautan p {
            margin: 5px 0;
        }

        .footer .tautan a {
            color: white;
            text-decoration: none;
        }

        .sosmed {
            margin: 5px;
            text-align: right;
            right: 20px;
            bottom: 80px;
            position: absolute;
        }

        .sosmed p {
            font-weight: bold;
        }

        .sosmed a {
            display: inline-block;
            margin-right: 10px; /* Jarak antar logo */
        }

        .logo-sosmed {
            width: 30px; /* Ukuran logo IG dan TikTok */
            height: 30px;
        }


        .tautan-content {
            display: flex;
        }

        @media (max-width: 768px) {
    .title-section {
        height: auto;
        padding-left: 5%;
        text-align: center;
    }

    .title {
        font-size: 12vw; /* Sesuaikan ukuran font dengan layar kecil */
    }

    .description {
        font-size: 4vw;
    }

    /* Sejarah  */
    section.bg-success {
        padding: 20px 10px;
    }

    /* Lokasi  */
    section.bg-location {
        padding: 20px 10px;
    }

    .bg-location .col-md-4 {
        margin-bottom: 20px;
    }

    .bg-location img {
        width: 100%;
    }

    .denah-image {
        max-width: 100%;
        height: auto;
    }

    /* Galeri */
    .frame-image {
        height: auto;
        padding: 10px;
    }

    .galeri-image {
        height: auto;
    }

    .text-image {
        font-size: 12px;
    }

    /* Footer */
    .footer {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .footer .logo-instansi {
        width: 80px;
        height: 80px;
    }

    .footer .alamat,
    .footer .tautan,
    .footer .sosmed {
        margin-left: 0;
    }

    .footer .alamat,
    .footer .tautan {
        margin-bottom: 20px;
    }

    .sosmed {
        right: auto;
        bottom: auto;
        position: static;
    }
}

    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #295A3F;">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><u>Beranda</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentangKami">Tentang Kami</a>
                    </li>
                </ul>
            </div>
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
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto1.jpg" alt="Foto 1" class="galeri-image">
                        <p class="text-image">Teks Foto 1</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto2.jpg" alt="Foto 2" class="galeri-image">
                        <p class="text-image">Teks Foto 2</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto3.jpg" alt="Foto 3" class="galeri-image">
                        <p class="text-image">Teks Foto 3</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="d-flex">
            <img src="/images/footer/logoInstansi.png" alt="Logo Instansi" class="logo-instansi">
            <div class="alamat">
                <p><b>Alamat</b></p>
                <p>Belik, Terawas</p>
                <div class="d-flex align-items-center">
                    <img src="/images/footer/logoWA.png" alt="Logo WA">
                    <p>0812345</p>
                </div>
                <div class="d-flex align-items-center">
                    <img src="/images/footer/logoEmail.png" alt="Logo Email">
                    <p>email</p>
                </div>
            </div>
            <div class="tautan-content">
                <div class="tautan">
                    <p><b>Tautan</b></p>
                    <a href="https://www.google.com/search?q=petung+park&oq=Petung+Park&gs_lcrp=EgZjaHJvbWUqCggAEAAY4wIYgAQyCggAEAAY4wIYgAQyDQgBEC4YrwEYxwEYgAQyBwgCEAAYgAQyBggDEEUYQDIICAQQABgWGB4yBggFEEUYPDIGCAYQRRg9MgYIBxBFGD3SAQg2NDk4ajBqN6gCALACAA&sourceid=chrome&ie=UTF-8"><u>Informasi Selengkapnya</u></a>
                </div>
            </div>
            <div class="sosmed">
                <p><b>Sosial Media</b></p>
                <a href="https://www.instagram.com/petungparktrawasnew/?hl=en">
                    <img src="/images/footer/logoIG.png" alt="Instagram" class="logo-sosmed">
                </a>
                <a href="https://l.instagram.com/?u=http%3A%2F%2Ftiktok.com%2F%40petungparktrawasnew&e=AT2kdtmsKBg1gQocMG5mbtAyE1ZMN9ZewhuDF1uOZ6FOrqjuaYtifRVvnZV4a3OcOY4esV5-IVAi6f4f-En1KU32CEox66TWGeJGOw">
                    <img src="/images/footer/logoTikTok.png" alt="TikTok" class="logo-sosmed">
                </a>
            </div>
        </div>
    </footer>

    <!-- Link Bootstrap JS dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
