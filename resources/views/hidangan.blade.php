@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/hidangan.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <div class="kategori-header">
            <a href="{{ route('kategori.makanan', $menu->category->id) }}" class="btn-kembali">Kembali</a>
        </div>
        <div class="hidangan-container">
            <img src="{{ asset($menu->gallery->photo_link ?? 'https://via.placeholder.com/300x300') }}" alt="hidangan" class="hidangan-gambar">
            <div class="hidangan-detail">
                <h3>{{ $menu->name }}</h3>
                <p class="desc">{{ $menu->description }}</p>
                <p class="harga">Harga: Rp. {{ number_format($menu->price, 0, ',', '.') }}</p>
                <p class="rekomendasi">
                    @if($menu->status_recommended == 1)
                        <i>Rekomendasi</i>
                    @endif
                </p>
                <div class="like-container">
                    <button class="like-button" data-menu-id="{{ $menu->id }}">
                        ❤️
                    </button>
                    <span class="number-love">{{ $menu->number_love }}</span> <!-- Display number_love here -->
                </div>
            </div>
        </div>
    </div>
@endsection
