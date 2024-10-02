@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kegiatan.css') }}">
@endsection

@section('container-main')
    <div class="kegiatan-detail">
        <h2>Detail Kegiatan Lalu</h2>

        <div class="kegiatan-info">
            <p><strong>Nama Kegiatan:</strong> {{ $agenda->event_name }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</p>
            <p><strong>Lokasi:</strong> {{ $agenda->event_location }}</p>
            <p><strong>Deskripsi:</strong> {{ $agenda->description }}</p> <!-- Ganti event_description dengan description -->
        </div>

        <h3>Artikel Terkait</h3>
        @if($articles->isEmpty())
            <p>Tidak ada artikel terkait.</p>
        @else
            @foreach($articles as $article)
                <div class="article">
                    <h4>{{ $article->title }}</h4>
                    <p>{{ $article->main_content }}</p>

                    <h5>Galeri:</h5>
                    @if($galleries->isEmpty())
    <p>Tidak ada galeri yang tersedia.</p>
@else
                        <div class="gallery">
                            @foreach($galleries as $gallery)
                                <div class="gallery-item">
                                    <img src="{{ $gallery->photo_link }}" alt="{{ $gallery->name }}">
                                    <p>{{ $gallery->description }}</p>
                                    <p>Likes: {{ $gallery->number_love }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        @endif

        <button onclick="window.history.back()">Kembali</button>
    </div>
@endsection
