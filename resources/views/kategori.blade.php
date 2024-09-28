@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kategori.css') }}">
@endsection
@section('container-main')
    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <div class="kategori-header">
            <a href="{{ url('layanan') }}" class="btn-kembali">Kembali</a>
            <h2>Kategori Kuliner</h2>
        </div>
        <div class="makanan-container">
            <!-- Makanan 1 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 1">
                <p class="judul-makanan">Makanan 1</p>
                <button onclick="window.location.href='{{ url('hidangan') }}'">Lihat Hidangan</button>
            </div>

            <!-- Makanan 2 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 2">
                <p class="judul-makanan">Makanan 2</p>
                <button onclick="window.location.href='{{ url('hidangan') }}'">Lihat Hidangan</button>
            </div>

            <!-- Makanan 3 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
                <p class="judul-makanan">Makanan 3</p>
                <button onclick="window.location.href='{{ url('hidangan') }}'">Lihat Hidangan</button>
            </div>

            <!-- Makanan 4 -->
            <div class="makanan">
                <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
                <p class="judul-makanan">Makanan 4</p>
                <button onclick="window.location.href='{{ url('hidangan') }}'">Lihat Hidangan</button>
            </div>
        </div>
    </div>
@endsection
