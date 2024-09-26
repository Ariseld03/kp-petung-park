@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
@endsection
@section('container-main')
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
            <p>Dolor sit possimus cumque eos expedita ratione recusandae nisi tenetur non alias, neque velit sint ducimus.
            </p>
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
@endsection
