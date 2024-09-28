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
            <p class="judul-makanan">Camilan</p>
            <button onclick="window.location.href='{{ url('kategori') }}'">Lihat Kategori</button>
        </div>

        <!-- Makanan 2 -->
        <div class="makanan">
            <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 2">
            <p class="judul-makanan">Makanan berat</p>
            <button onclick="window.location.href='{{ url('kategori') }}'">Lihat Kategori</button>
        </div>

        <!-- Makanan 3 -->
        <div class="makanan">
            <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
            <p class="judul-makanan">Minuman</p>
            <button onclick="window.location.href='{{ url('kategori') }}'">Lihat Kategori</button>
        </div>

        <!-- Makanan 4 -->
        <div class="makanan">
            <img src="https://via.placeholder.com/300x200" alt="Foto Makanan 3">
            <p class="judul-makanan">Es krim</p>
            <button onclick="window.location.href='{{ url('kategori') }}'">Lihat Kategori</button>
        </div>
    </div>
</div>
<!-- Kategori Wisata -->
<div class="kategori-wisata">
    <h2>Wisata</h2>

    <div class="wisata-container">
        <!-- Wisata 1 -->
        <div class="wisata">
            <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 1">
            <p class="judul-wisata">Gazebo Kecek</p>
            <button onclick="window.location.href='{{ url('wisata') }}'">Baca Lebih Banyak</button>
        </div>

        <!-- Wisata 2 -->
        <div class="wisata">
            <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 2">
            <p class="judul-wisata">Kolam</p>
            <button onclick="window.location.href='{{ url('wisata') }}'">Baca Lebih Banyak</button>
        </div>

        <!-- Wisata 3 -->
        <div class="wisata">
            <img src="https://via.placeholder.com/300x200" alt="Foto Wisata 3">
            <p class="judul-wisata">Hutan Bambu</p>
            <button onclick="window.location.href='{{ url('wisata') }}'">Baca Lebih Banyak</button>
        </div>
    </div>
</div>

    <!-- Kegiatan Mendatang -->
    <div class="kegiatan">
        <h2>Kegiatan Mendatang</h2>

        <div class="kegiatan-container">
            <!-- Daftar Kegiatan Mendatang -->
            <div class="kegiatan-mendatang">
                <table border="0"> <!--biar border hilang-->
                    @forelse($kegiatanMendatang as $agenda)
                        <tr>
                            <td>Tanggal: {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</td>
                            <td>{{ $agenda->event_name }}</td>
                            <td>{{ $agenda->event_location }}</td>
                            <td><button class="cek-kegiatan-button">Cek Kegiatan</button></td>
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
            @forelse($kegiatanLalu as $agenda)
                <div class="kegiatan-lalu">
                    <img src="https://via.placeholder.com/300x200" alt="Icon Kegiatan Lalu">
                    <div>
                        <div class="judul-kegiatan-lalu">{{ $agenda->event_name }}</div>
                        <div class="deskripsi-kegiatan-lalu" style="margin-top: 5px;">
                            Tanggal: {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }} <br>
                            {{ $agenda->event_location }}
                        </div>
                    </div>
                    <button>Cek Kegiatan</button>
                </div>
            @empty
                <div>Tidak ada kegiatan lalu.</div>
            @endforelse
        </div>
    </div>

@endsection
