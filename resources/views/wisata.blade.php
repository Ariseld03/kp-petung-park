@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/wisata.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Wisata -->
    <div class="kategori-wisata">
        <div class="kategori-header">
            <a href="{{ url('layanan') }}" class="btn-kembali">Kembali</a>
            <h2>{{ $travel->name }}</h2>
        </div>
        
        
        <!-- Galeri -->
        <div class="galeri-container">
            <!--<h3>Galeri</h3>-->
            <div class="galeri-grid">
                @forelse($galleries as $gallery)
                    <div class="galeri-item">
                        <img src="{{ $gallery->photo_link }}" alt="{{ $gallery->name }}">
                        <p>{{ $gallery->name }}</p>
                        <p>{{ $gallery->description }}</p>
                    </div>
                @empty
                    <p>Tidak ada gambar yang tersedia.</p>
                @endforelse
            </div>
        </div>

        <div class="wisata-container">
            <p>{{ $travel->description }}</p>
        </div>

    </div>
@endsection
