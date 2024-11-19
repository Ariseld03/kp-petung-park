@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/layanan.css') }}">
@endsection
@section('container-main')

<!-- Kategori Paket -->
<div class="kategori-paket">
    <h2>Paket Menu</h2>

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
    <h2>Kategori Kuliner</h2>

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
    <h2>Wisata</h2>

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


    <!-- Kegiatan Mendatang -->
<div class="kegiatan">
    <h2>Kegiatan Mendatang</h2>

    <div class="kegiatan-container">
        <div class="kegiatan-mendatang">
            <table border="0">
                @forelse($kegiatanMendatang as $agenda)
                    <tr>
                        <td>Tanggal: {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</td>
                        <td>{{ $agenda->event_name }}</td>
                        <td>{{ $agenda->event_location }}</td>
                        <td>
                            <button class="cek-kegiatan-button" onclick="window.location.href='{{ route('kegiatan.mendatang', $agenda->id) }}'">Cek Kegiatan</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada kegiatan mendatang.</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>

    <!-- Kegiatan Lalu -->
<div class="kegiatan">
    <h2>Kegiatan Lalu</h2>

    <div class="kegiatan-container">
        @forelse($kegiatanLalu as $past)
            <div class="kegiatan-lalu">
                @php
                    $galleries = $past->articles()->with('galleries')->get()->pluck('galleries')->flatten();
                    $photo = $galleries->isNotEmpty() ? $galleries->first()->photo_link : '/images/galeri/pemandangan/jalanHutanBambu_2.JPG';
                @endphp
                <img src="{{asset($photo)}}" alt="Icon Kegiatan Lalu">
                <div>
                    <div class="judul-kegiatan-lalu">{{ $past->event_name }}</div>
                    <div class="deskripsi-kegiatan-lalu" style="margin-top: 5px;">
                        Tanggal: {{ \Carbon\Carbon::parse($past->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($past->event_end_date)->format('d/m/Y') }} <br>
                        {{ $past->event_location }}
                    </div>
                </div>
                <button onclick="window.location.href='{{ route('kegiatan.lalu', $past->id) }}'">Cek Kegiatan</button>
            </div>
        @empty
            <div>Tidak ada kegiatan lalu.</div>
        @endforelse
    </div>
</div>


@endsection
