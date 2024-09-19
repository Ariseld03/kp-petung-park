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

        /* Styling untuk info1 */
        .info1 {
            background-color: #449E47;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
        }

        .text-info1 {
            color: white;
            text-align: left;
            padding: 20px 10px;
            margin-left: 25px;
            margin-right: 25px;
        }

        .gambar-info1 {
            width: 40%;
            height: 100%;
            margin-left: 20px;
            object-fit: cover;
        }

        /* Styling untuk info2 */
        .info2 {
            background-color: #295A3F;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0; /* Hilangkan padding pada info2 */
        }

        .gambar-info2 {
            width: 900px;
            height: 400px;
            object-fit: cover;
            margin: 0; /* Hilangkan jarak atas dan bawah */
        }

        /* Styling untuk info3 */
        .info3 {
            background-color: #A0D0B3;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
            flex-direction: row-reverse; /* Membalik posisi gambar dan teks */
        }

        .text-info3 {
            color: #295A3F;
            text-align: right;
            padding: 20px 10px;
            margin-left: 25px;
            margin-right: 25px;
        }

        .gambar-info3 {
            width: 40%;
            height: 100%;
            margin-right: 20px;
            object-fit: cover;
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

        /* Media Query untuk tampilan mobile */
        @media (max-width: 768px) {
            .info1 {
                flex-direction: column-reverse; /* Membuat gambar di atas teks */
                align-items: center; /* Membuat konten di dalamnya rata tengah */
            }

            .gambar-info1 {
                width: 100%; /* Gambar memenuhi lebar layar */
                margin-left: 0;
            }

            .text-info1 {
                margin-left: 10px;
                margin-right: 10px;
                text-align: center; /* Rata tengah untuk teks */
            }

            .info3 {
                flex-direction: column; /* Mengubah arah flex menjadi column pada layar kecil */
                align-items: center; /* Membuat konten di dalamnya rata tengah */
            }

            .gambar-info3 {
                width: 100%; /* Gambar memenuhi lebar layar */
                margin-right: 0;
            }

            .text-info3 {
                margin-left: 10px;
                margin-right: 10px;
                text-align: center; /* Rata tengah untuk teks */
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
                        <a class="nav-link " href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><u>Tentang Kami</u></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Info1 -->
    <div class="info1">
        <div class="text-info1">
            <h2>Judul Info 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <img src="https://via.placeholder.com/600x400" alt="Gambar Info 1" class="gambar-info1">
    </div>

    <!-- Info2 -->
    <div class="info2">
        <img src="https://via.placeholder.com/900x400" alt="Gambar Info 2" class="gambar-info2">
    </div>

    <!-- Info3 (gambar di kiri, teks di kanan) -->
    <div class="info3">
        <div class="text-info3">
            <h2>Judul Info 3</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
        </div>
        <img src="https://via.placeholder.com/600x400" alt="Gambar Info 3" class="gambar-info3">
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
