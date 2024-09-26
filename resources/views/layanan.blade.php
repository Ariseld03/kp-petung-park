@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/layanan.css') }}">
@endsection
@section('container-main')
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

            <!-- Makanan 4 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
                <p class="judul-makanan">Makanan 4</p>
                <p class="deskripsi-makanan">Deskripsi makanan 4</p>
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
@endsection
