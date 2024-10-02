@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kegiatan.css') }}">
@endsection

@section('container-main')
    <div class="kegiatan-detail">
        <h2>Detail Kegiatan Mendatang</h2>

        <div class="kegiatan-info">
            <p><strong>Nama Kegiatan:</strong> {{ $agenda->event_name }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</p>
            <p><strong>Lokasi:</strong> {{ $agenda->event_location }}</p>
            <p><strong>Deskripsi:</strong> {{ $agenda->event_description }}</p>
        </div>

        <h3>Galeri Kegiatan</h3>
        @if($galleries->isEmpty())
            <p>Tidak ada galeri yang tersedia.</p>
        @else
            <div class="gallery">
                @foreach($galleries as $gallery)
                    <div class="gallery-item">
                        <img src="{{ $gallery->photo_link }}" alt="{{ $gallery->name }}">
                        <p>{{ $gallery->description }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        <button onclick="window.history.back()">Kembali</button>
    </div>
@endsection
