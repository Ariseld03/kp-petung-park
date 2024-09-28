@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
@endsection
@section('container-main')
    <!-- Bagian Judul -->
    <div class="title-section">
        <h1 class="title">Petung Park</h1>
        <p class="description">Mencari tempat jalan jalan yang ramah di kantong? Ada satu destinasi wisata yang tersembunyi di kota Mojokerto yang layak dipertimbangkan. Lokasinya terletak di Trawas, menawarkan keindahan yang luar biasa. Alam yang masih asri, pemandangan yang menakjubkan, dan udara segar yang mengalir dengan alami akan memberikan makna baru bagi liburanmu dan membantu merilekskan pikiran yang lelah.</p>
    </div>

    <!-- Bagian Sejarah -->
    <section class="bg-success text-white text-center py-5">
        <div class="container">
            <h2 class="title-sejarah">Sejarah</h2>
            <p class ="desc-sejarah">Rencana pembangunan sudah sejak 2019 untuk menjadikan Desa Belik yang berbatasan dengan Pasuruan menjadi tempat wisata.
                Pada 2021 munculah ide untuk menjadikan hutan bambu sebagai tempat wisata.
                Dan akhirnya dibuka lah pada 18 November 2022 .
            </p>
        </div>
    </section>

    <!-- Bagian Lokasi -->
    <section class="bg-location text-dark text-center py-5">
        <div class="container">
            <h2 class="title-konten">Lokasi Petung Park</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <img src="/images/beranda/lokasi/lokasiImage.jpg" alt="Lokasi Petung Park" class="img-lokasi">
                </div>
                <div class="desc-lokasi">
                    <p>Jibru, Belik, Kec. Trawas, Kabupaten Mojokerto, Jawa Timur 61375</p>
                    <p>0831-3281-9058</p>
                    <p>009.00 - 17.00</p>
                </div>
            </div>
            <h2 class="title-konten">Denah Petung Park</h2>
            <div class="mt-4">
                <img src="/images/beranda/lokasi/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
            </div>
        </div>
    </section>

    <!-- Bagian Galeri -->
    <section class="bg-custom text-white text-center py-5">
        <div class="container">
            <h2 class="title-konten">Galeri</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-3">
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto1.jpg" alt="Foto 1" class="galeri-image">
                        <p class="text-image">Mountain Peak</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto2.jpg" alt="Foto 2" class="galeri-image">
                        <p class="text-image">Sunset Over the Mountains</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="frame-image">
                        <img src="/images/beranda/galeri/foto3.jpg" alt="Foto 3" class="galeri-image">
                        <p class="text-image">Forest Path</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
