@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/layanan.css') }}">
@endsection
@section('container-main')

<!-- Kategori Paket -->
<div class="kategori-paket">
    <div class="center-screen">
        <h2 style="padding-bottom: 20px" style="padding-top: 10px" style="font-weight: bolder" style="font-size: x-larger"><u>Wisata Kuliner</u></h2>
    </div>

    <h2>Menu Paket</h2>

    <div name="paket-menu" class="paket-container">
        @forelse($paket as $perpaket)
            <div class="paket">
                    @php
                        $photo = $perpaket->menus->isNotEmpty() ? $perpaket->menus->first()->gallery->photo_link : '/images/footer/logoPetungPark.png';
                    @endphp
                <img src="{{ asset($photo) }}" alt="Foto {{ $perpaket->name }}">
                <p class="judul-paket">{{ $perpaket->name }}</p>
                <button onclick="window.location.href='{{ route('paket.show', $perpaket->id) }}'">Baca Lebih Banyak</button>

            </div>
        @empty
            <p>Tidak ada menu paket yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>



<!-- Kategori Makanan -->
<div class="kategori-makanan">
    <h2>Menu Reguler</h2>

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
</div>

<!-- Kategori Wisata -->
<div class="kategori-wisata">
    <h2>Wisata Alam</h2>

    <div class="wisata-container">
        @forelse($wisata as $spot)
            <div class="wisata">
                    @php
                        $photo = $spot->galleries->isNotEmpty() ? $spot->galleries->first()->photo_link : '/images/footer/logoPetungPark.png';
                    @endphp
                <img src="{{ asset($photo) }}" alt="Foto {{ $spot->name }}">
                <p class="judul-wisata">{{ $spot->name }}</p>
                <button onclick="window.location.href='{{ url('wisata/'.$spot->id) }}'">Baca Lebih Banyak</button>
            </div>
        @empty
            <p>Tidak ada wisata yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>

@endsection
