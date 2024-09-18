<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tentang Petung Park</title>

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

        footer {
            background-color: #333;
            color: white;
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
                        <a class="nav-link " href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><u>Layanan</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <div class="container mt-5">
        <h1>Selamat Datang di Website</h1>
        <p>Ini adalah contoh konten untuk halaman web.</p>
    </div>

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
                    <a href="#"><u>Informasi Selengkapnya</u></a>
                </div>
            </div>
            <div class="sosmed">
                <p><b>Sosial Media</b></p>
                <a href="#">
                    <img src="/images/footer/logoIG.png" alt="Instagram" class="logo-sosmed">
                </a>
                <a href="#">
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
