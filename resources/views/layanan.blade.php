<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Layanan</title>

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

        /* Styling untuk kategori-makanan */
        .kategori-makanan {
            background-color: #E2DD6C;
            padding: 10px 0; /* Full width background */
            width: 100vw;
            position: relative;
        }

        .kategori-makanan h2 {
            color: #295A3F;
            font-size: 40px;
            font-weight: bold;
            margin: 35px 0; /* Jarak atas dan bawah*/
            text-align: center; /* Judul di tengah */
        }

        .makanan-container {
            display: flex;
            justify-content: center; /* Elemen makanan rata tengah */
            flex-wrap: wrap;
            padding: 0 15px;
        }

        .makanan {
            width: 30%;
            margin: 15px;
            box-sizing: border-box;
            text-align: center; /* Text pada makanan juga rata tengah */
        }

        .makanan img {
            width: 300px; 
            height: 300px; 
            object-fit: cover; /* Agar gambar tidak terdistorsi */
        }

        .makanan .judul-makanan {
            color: #295A3F;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 1px;
            font-size: 30px;
        }

        .makanan .deskripsi-makanan {
            color: #295A3F;
            margin-bottom: 15px;
            font-size: 25px;
        }

        .makanan button {
            background-color: #295A3F;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .makanan button:hover {
            background-color: #3b7a53;
        }

        /* Styling untuk kategori-wisata */
        .kategori-wisata {
            background-color: #295A3F;
            padding: 10px 0; /* Full width background */
            width: 100vw;
            position: relative;
        }

        .kategori-wisata h2 {
            color: #E2DD6C;
            font-size: 40px;
            font-weight: bold;
            margin: 35px 0; /* Jarak atas dan bawah */
            text-align: center; /* Judul di tengah */
        }

        .wisata-container {
            display: flex;
            justify-content: center; /* Elemen wisata rata tengah */
            flex-wrap: wrap;
            padding: 0 15px;
        }

        .wisata {
            width: 30%;
            margin: 15px;
            box-sizing: border-box;
            text-align: center; /* Text pada wisata juga rata tengah */
        }

        .wisata img {
            width: 300px; 
            height: 300px; 
            object-fit: cover; /* Agar gambar tidak terdistorsi */
        }

        .wisata .judul-wisata {
            color: #E2DD6C;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 1px;
            font-size: 30px;
        }

        .wisata .deskripsi-wisata {
            color: #E2DD6C;
            margin-bottom: 15px;
            font-size: 25px;
        }

        .wisata button {
            background-color: #E2DD6C;
            color: #295A3F;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-bottom: 30px;
        }

        .wisata button:hover {
            background-color: #d4ca5b;
        }

        /* Styling untuk kegiatan */
        .kegiatan {
            background-color: #A0D0B3;
            padding: 10px 0;
            width: 100vw;
            position: relative;
        }

        .kegiatan h2 {
            color: #353C14;
            font-size: 40px;
            font-weight: bold;
            margin: 35px 0;
            text-align: center;
        }

        .kegiatan-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0 15px;
        }

        .kegiatan-mendatang {
            width: 60%;
            margin: 15px;
            box-sizing: border-box;
            text-align: center;
        }

        .kegiatan-mendatang table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Revisi: Hanya menampilkan border bawah */
        .kegiatan-mendatang table td {
            padding: 10px;
            color: #353C14;
            border-bottom: 3px solid #353C14; /* Border bawah dengan ketebalan 3px */
        }

        .kegiatan-mendatang table td:first-child {
            width: 15%;
            font-weight: bold;
        }

        .kegiatan-mendatang .cek-kegiatan-button {
            background-color: #353C14;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
        }

        .kegiatan-mendatang .cek-kegiatan-button:hover {
            background-color: #2c3311;
        }

        .kegiatan-mendatang table tr td:last-child {
            text-align: center;
        }

        /* Styling untuk kegiatan lalu */
        .kegiatan-container {
            display: flex;
            justify-content: center; /* Menjadikan elemen-elemen di dalam container rata tengah */
            flex-wrap: wrap;
            padding: 0 15px;
        }

        .kegiatan-lalu {
            margin-top: 30px;
            display: flex;
            align-items: center;
            justify-content: center; /* Membuat konten kegiatan-lalu berada di tengah */
            width: 80%; /* Lebar elemen */
        }

        .kegiatan-lalu img {
            width: 300px;
            height: 200px;
            padding-bottom: 30px;
        }

        .deskripsi-kegiatan-lalu{
            margin-top: 5px;
            margin-left: 20px;
            color: #353C14;
            font-size: 16px;
        }

        .kegiatan-lalu .judul-kegiatan-lalu {
            margin-left: 20px; /* Jarak antara gambar dan judul */
            font-size: 20px;
            color: #353C14;
        }

        .kegiatan-lalu button {
            margin-left: 20px; /* Jarak antara judul dan button */
            background-color: #353C14;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .kegiatan-lalu button:hover {
            background-color: #2c3311;
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
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><u>Layanan</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <h2>Kategori Kuliner</h2>
        
        <div class="makanan-container">
            <!-- Makanan 1 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 1">
                <p class="judul-makanan">Makanan 1</p>
                <p class="deskripsi-makanan">Deskripsi makanan 1</p>
                <button>Pesan</button>
            </div>

            <!-- Makanan 2 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 2">
                <p class="judul-makanan">Makanan 2</p>
                <p class="deskripsi-makanan">Deskripsi makanan 2</p>
                <button>Pesan</button>
            </div>

            <!-- Makanan 3 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
                <p class="judul-makanan">Makanan 3</p>
                <p class="deskripsi-makanan">Deskripsi makanan 3</p>
                <button>Pesan</button>
            </div>
        </div>
    </div>
    <!-- Kategori Wisata -->
    <div class="kategori-wisata">
        <h2>Kategori Wisata</h2>
        
        <div class="wisata-container">
            <!-- Wisata 1 -->
            <div class="wisata">
                <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 1">
                <p class="judul-wisata">Wisata 1</p>
                <p class="deskripsi-wisata">Deskripsi singkat tentang wisata 1.</p>
                <button>Baca Lebih Banyak</button>
            </div>

            <!-- Wisata 2 -->
            <div class="wisata">
                <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 2">
                <p class="judul-wisata">Wisata 2</p>
                <p class="deskripsi-wisata">Deskripsi singkat tentang wisata 2.</p>
                <button>Baca Lebih Banyak</button>
            </div>

            <!-- Wisata 3 -->
            <div class="wisata">
                <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 3">
                <p class="judul-wisata">Wisata 3</p>
                <p class="deskripsi-wisata">Deskripsi singkat tentang wisata 3.</p>
                <button>Baca Lebih Banyak</button>
            </div>
        </div>
    </div>

    <!-- Kegiatan Mendatang -->
    <div class="kegiatan">
        <h2>Kegiatan</h2>
        
        <div class="kegiatan-container">
            <!-- Daftar Kegiatan -->
            <div class="kegiatan-mendatang">
                <table border="0"> <!--biar border hilang-->
                    <tr>
                        <td>Tanggal: 12/09/2024</td>
                        <td>Nama Kegiatan 1</td>
                        <td>Deskripsi</td>
                        <td><button class="cek-kegiatan-button">Cek Kegiatan</button></td>
                    </tr>
                    <tr>
                        <td>Tanggal: 13/09/2024</td>
                        <td>Nama Kegiatan 2</td>
                        <td>Deskripsi</td>
                        <td><button class="cek-kegiatan-button">Cek Kegiatan</button></td>
                    </tr>
                    <tr>
                        <td>Tanggal: 14/09/2024</td>
                        <td>Nama Kegiatan 3</td>
                        <td>Deskripsi</td>
                        <td><button class="cek-kegiatan-button">Cek Kegiatan</button></td>
                    </tr>
                </table>
            </div>
            <!-- Kegiatan Lalu -->
            <div class="kegiatan-lalu">
                <img src="https://via.placeholder.com/300x200" alt="Icon Kegiatan Lalu">
                <div>
                    <div class="judul-kegiatan-lalu">Nama Kegiatan Lalu</div>
                    <div class="deskripsi-kegiatan-lalu" style="margin-top: 5px;">
                        Deskripsi
                    </div>
                </div>
                <button>Cek Kegiatan</button>
            </div>
        </div>
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
