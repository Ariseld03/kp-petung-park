<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petung Park</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            overflow-x: hidden;
        }

        .header {
            background-color: #295A3F; 
            color: white;
            padding: 1.5% 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .nav {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10%; /* Menambah jarak antar elemen */
        }

        .nav-item {
            color: white;
            cursor: pointer;
            font-size: 1.5vw; 
            font-weight: bold; 
            white-space: nowrap; /* Menghindari teks bertumpuk ke bawah */
        }

        .nav-item.active {
            text-decoration: underline;
        }

        .nav-item.button {
            border: none;
            background: none;
            color: white;
        }

        .login-button {
            position: absolute;
            right: 3%;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            color: white;
            border: none;
            font-size: 1.5vw;
            font-weight: bold;
            cursor: pointer;
        }

        .title-section {
            background-image: url('/images/beranda/berandaPetungPark.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            width: 100vw; 
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-left: 8%;
            text-align: left;
        }
        .title {
            font-size: 8vw;
            font-weight: bold;
            margin-top: 0;
        }
        .description {
            margin-top: 1%;
            font-size: 2vw;
        }

        .sejarah {
            background-color: #449E47; 
            color: white;
            padding: 5% 2%;
            text-align: center;
        }

        .titleSejarah {
            font-size: 2.5vw;
            font-weight: bold;
            margin-top: 0;
        }

        .lokasi {
            position: relative;
            padding: 5% 2%;
            background-color: #A1D0B3; 
            color: #295A3F;
            text-align: center;
        }
        .titleLokasi {
            font-size: 2.5vw;
            font-weight: bold;
            margin-top: 0;
        }
        .lokasi-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 2%;
            margin-bottom: 5%;
        }

        .lokasi-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5%;
        }

        .lokasi-image {
            flex: 1;
            max-width: 30%;
        }

        .lokasi-image img {
            width: 100%;
            height: auto;
        }

        .lokasi-text {
            flex: 1;
            text-align: left;
        }

        .lokasi-text p {
            margin: 1% 0;
        }

        .denah-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 2%;
        }

        .denah-image {
            max-width: 50%; 
            height: auto;
        }

        .galeri {
            text-align: center;
            background-color: #295A3F;
            padding: 5% 2%;
        }
        .titleGaleri {
            font-size: 2.5vw;
            font-weight: bold;
            margin-top: 0;
            color: white;
        }
        .galeri-images {
            display: flex;
            justify-content: center;
            gap: 10%;
        }

        .galeri-image-wrapper {
            position: relative;
            width: 15%;
            height: auto;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 5%;
        }

        .galeri-image {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .galeri-text {
            margin-top: 5%;
            font-size: 1.5vw;
            color: #295A3F;
            text-align: center;
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 2%;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <div class="nav">
            <div class="nav-item active">Beranda</div>
            <div class="nav-item button">Layanan</div>
            <div class="nav-item button">Tentang Kami</div>
        </div>
        <button class="login-button">Login</button>
    </div>

    <!-- Bagian Judul -->
    <div class="title-section">
        <h1 class="title">Petung Park</h1>
        <p class="description">Deskripsi</p>
    </div>

    <!-- Bagian Sejarah -->
    <div class="section sejarah">
        <h2 class="titleSejarah">Sejarah</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        <p>Dolor sit possimus cumque eos expedita ratione recusandae nisi tenetur non alias, neque velit sint ducimus. </p>
        <p>Illo architecto corporis molestias commodi error.</p>
    </div>

    <!-- Bagian Lokasi -->
    <div class="section lokasi">
        <h2 class="titleLokasi">Lokasi Petung Park</h2>
        <div class="lokasi-wrapper">
            <div class="lokasi-content">
                <div class="lokasi-image">
                    <img src="/images/beranda/lokasi/lokasiImage.jpg" alt="Lokasi Petung Park">
                </div>
                <div class="lokasi-text">
                    <p>Alamat</p>
                    <p>No Telepon</p>
                    <p>Jam Buka - Tutup</p>
                </div>
            </div>
        </div>
        <h2 class="titleLokasi">Denah Petung Park</h2>
        <div class="denah-wrapper">
            <img src="/images/beranda/lokasi/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
        </div>
    </div>

    <!-- Bagian Galeri -->
    <div class="section galeri">
        <h2 class="titleGaleri">Galeri</h2>
        <div class="galeri-images">
            <div class="galeri-image-wrapper">
                <img src="/images/beranda/galeri/foto1.jpg" alt="Foto 1" class="galeri-image">
                <div class="galeri-text">Teks Foto 1</div>
            </div>
            <div class="galeri-image-wrapper">
                <img src="/images/beranda/galeri/foto2.jpg" alt="Foto 2" class="galeri-image">
                <div class="galeri-text">Teks Foto 2</div>
            </div>
            <div class="galeri-image-wrapper">
                <img src="/images/beranda/galeri/foto3.jpg" alt="Foto 3" class="galeri-image">
                <div class="galeri-text">Teks Foto 3</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Kontak</p>
    </footer>

</body>
</html>
