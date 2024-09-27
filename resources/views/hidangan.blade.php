@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/kategori.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Makanan -->
    <div class="kategori-makanan">
        <div class="kategori-header">
            <a href="{{ url('kategori') }}" class="btn-kembali">Kembali</a>
            <h2>Kategori Kuliner</h2>
        </div>
        <img src="https://via.placeholder.com/300x300" alt="hidangan" class="hidangan-gambar">
    </div>
@endsection
