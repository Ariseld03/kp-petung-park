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
        @forelse($travels as $travel)
            <div class="wisata">
                <img src="https://via.placeholder.com/300x200" alt="Foto {{ $travel->name }}">
                <p class="judul-wisata">{{ $travel->name }}</p>
                <button onclick="window.location.href='{{ url('wisata/'.$travel->id) }}'">Baca Lebih Banyak</button>
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
                <button onclick="window.location.href='{{ route('kegiatan.lalu', $agenda->id) }}'">Cek Kegiatan</button>
            </div>
        @empty
            <div>Tidak ada kegiatan lalu.</div>
        @endforelse
    </div>
</div>


@endsection
