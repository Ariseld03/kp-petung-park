@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kegiatan.css') }}">
@endsection

@section('container-main')
    <div class="kegiatan-detail">
        <a href="{{ url()->previous() }}" class="btn-kembali">Kembali</a>
        <h2>{{ $agenda->event_name }}</h2>

        <div class="gallery">
            @foreach($galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset($gallery->photo_link) }}" alt="{{ $gallery->name }}" class="gallery-img">
                    <p>{{ $gallery->description }}</p>
                    <span class="like-icon">❤️ {{ $gallery->number_love }}</span>
                </div>
            @endforeach
        </div>

        <div class="kegiatan-info">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($agenda->event_start_date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($agenda->event_end_date)->format('d/m/Y') }}</p>
            <p><strong>Lokasi:</strong> {{ $agenda->event_location }}</p>
            <p><strong>Deskripsi: <br></strong></p>
            <p style="text-align: justify;"> {{ $agenda->description }}</p>
        </div>

        <div class="artikel">
            <h3>Artikel Terkait</h3>
            @if($articles->isEmpty())
                <p>Tidak ada artikel terkait.</p>
            @else
                @foreach($articles as $article)
                    <div class="article">
                        <h4>{{ $article->title }}</h4>
                        <p>{{ $article->main_content }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
