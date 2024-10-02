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
            @forelse($kategori->menus as $menu)
                <div class="makanan">
                    <img src="{{ asset($menu->gallery->photo_link ?? 'https://via.placeholder.com/300x200') }}" alt="Foto {{ $menu->name }}">
                    <p class="judul-makanan">{{ $menu->name }}</p>
                    <button onclick="window.location.href='{{ url('hidangan', $menu->id) }}'">Lihat Hidangan</button>
                </div>
            @empty
                <p>Tidak ada hidangan yang tersedia untuk kategori ini.</p>
            @endforelse
        </div>
    </div>
@endsection
