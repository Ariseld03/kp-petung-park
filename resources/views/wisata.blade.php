@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/wisata.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Wisata -->
    <div class="kategori-wisata">
        <div class="kategori-header">
            <a href="{{ url('layanan') }}" class="btn-kembali">Kembali</a>
            <h2>Nama Wisata</h2>
        </div>
        <div class="wisata-container">
            <h2>{{ $travel->name }}</h2>
            <p>{{ $travel->description }}</p>
        </div>
    </div>
@endsection
