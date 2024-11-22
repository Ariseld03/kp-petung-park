@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kategori.css') }}">
@endsection
@section('container-main')
    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <div class="kategori-header">
            <a href="{{ route('wisata') }}" class="btn-kembali">Kembali</a>
            <h2>Kategori Kuliner</h2>
        </div>
        <div class="makanan-container">
        @forelse($kategori as $perkategori)
            <div class="makanan">
                    @php
                    $fotoMakanan = $perkategori->menus->isNotEmpty() ? $perkategori->menus->first()->gallery->photo_link : "/images/footer/logoPetungPark.png";
                    @endphp
                <img src="{{ asset($fotoMakanan) }}" alt="Foto {{$perkategori->name }}">
                <p class="judul-makanan">{{$perkategori->name }}</p>
                <button onclick="window.location.href='{{ route('kategori.makanan', $perkategori->id) }}'">Lihat Kategori</button>
            </div>
        @empty
            <p>Tidak ada menu yang tersedia saat ini.</p>
        @endforelse
    </div>
@endsection
