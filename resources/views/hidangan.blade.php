@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/hidangan.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <div class="kategori-header">
            <a href="{{ url('kategori') }}" class="btn-kembali">Kembali</a>
            <h2>Kategori Kuliner</h2>
        </div>
        <div class="hidangan-container">
            <img src="https://via.placeholder.com/300x300" alt="hidangan" class="hidangan-gambar">
            <div class="hidangan-detail">
                <h3>Judul Hidangan</h3>
                <p>Deskripsi hidangan.</p>
                <p class="harga">Harga: Rp. 50.000</p>
                <p class="rekomendasi">Rekomendasi</p>
                <button class="like-button">
                    ❤️
                </button>
            </div>
        </div>
    </div>
@endsection
