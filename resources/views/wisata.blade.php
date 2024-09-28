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
            <img src="https://via.placeholder.com/300x300" alt="wisata" class="wisata-gambar">
            <div class="wisata-detail">
                <p>Deskripsi wisata.</p>
            </div>
        </div>
    </div>
@endsection
