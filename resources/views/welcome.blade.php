<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petung Park</title>
    <!-- Tambahkan CSS untuk styling -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            overflow-x: hidden;
        }

        /* Styling untuk header */
        .header {
            background-color: #295A3F; 
            color: white;
            padding: 20px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative; /* Agar bisa meletakkan tombol login di pojok kanan */
        }
        .nav {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .nav-item {
            margin: 0 15px;
            color: white;
            cursor: pointer;
            font-size: 20px; /* Ukuran font */
            font-weight: bold; 
        }
        .nav-item.active {
            text-decoration: underline;
        }
        .nav-item.button {
            border: none;
            background: none;
            color: white;
        }

        /* Styling untuk tombol Login */
        .login-button {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            color: white;
            border: none;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        /* Styling untuk bagian judul */
        .title-section {
            background-image: url('/images/berandaPetungPark.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            width: 100vw; 
            height: 100vh; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start; /* letak di kiri */
            padding-left: 100px; /* jarak dari kiri */
            text-align: left; /* Teks rata ke kiri */
        }
        .title {
            font-size: 100px;
            font-weight: bold;
            margin-top: 0;
        }
        .description {
            margin-top: 10px;
            font-size: 20px;
        }

        /* Styling untuk bagian sejarah */
        .sejarah {
            background-color: #449E47; 
            color: white; /* Teks putih */
            padding: 50px 20px;
            text-align: center;
        }

        .titleSejarah {
            font-size: 30px;
            font-weight: bold;
            margin-top: 0;
        }

        /* Styling untuk bagian lokasi */
        .lokasi {
            position: relative;
            padding: 50px 20px;
            background-color: #A1D0B3; 
            color: #295A3F;
            text-align: center;
        }

        .lokasi-wrapper {
            display: flex;
            justify-content: center; /* Memusatkan secara horizontal */
            align-items: center; /* Memusatkan secara vertikal */
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .lokasi-content {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 50px; /* Jarak antara gambar dan teks */
        }

        .lokasi-image {
            flex: 1;
            max-width: 400px;
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
            margin: 10px 0;
        }

        /* Styling untuk gambar denah */
        .denah-wrapper {
            display: flex;
            justify-content: center; /* ngepasin gambar horizontal */
            margin-top: 20px;
        }

        .denah-image {
            max-width: 50%; /* ukuran gambar sama lebar container */
            height: auto;
        }


        /*Styling untuk bagian galeri */
        .galeri {
            text-align: center;
            background-color: #f4f4f4;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px;
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
        <!-- Tombol Login di pojok kanan -->
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
                <img src="/images/lokasiImage.jpg" alt="Lokasi Petung Park">
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
        <img src="/images/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
    </div>
    </div>

    <!-- Bagian Galeri -->
    <div class="section galeri">
        <h2>Galeri</h2>
        <p>Lihat beberapa foto tempat wisata Petung Park...</p>
    </div>

    <!-- Footer -->
    <footer>
        <p>Kontak</p>
    </footer>

</body>
</html>
