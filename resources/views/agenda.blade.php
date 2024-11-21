@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/agenda.css') }}">
@endsection
@section('container-main')
 <!-- Kegiatan Mendatang -->
 <div class="kegiatan">
    <h2>Kegiatan Mendatang</h2>

    <div class="kegiatan-container">
        <div class="kegiatan-mendatang">
            <table border="0">
                @forelse($kegiatanMendatang as $agenda)
                    <tr>
                        <td>Tanggal: {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</td>
                        <td class="judul-kegiatan-mendatang">{{ $agenda->event_name }}</td>
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
                        Tanggal: {{ \Carbon\Carbon::parse($past->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($past->event_end_date)->format('d/m/Y') }}
                        <div class="lokasi-kegiatan-lalu" style="margin-top: 5px;">
                        {{ $past->event_location }}
                        </div>
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
