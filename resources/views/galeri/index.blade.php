@extends('layouts.mainAdmin') <!-- Menggunakan layout mainAdmin -->
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/galeri.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Galeri</h1>
        <a href="{{ url('/galeriAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Foto</a>
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Banyak Like</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data galeri, dapat diulang sesuai kebutuhan -->
                <tr>
                    <td>Contoh Galeri 1</td>
                    <td><img src="link_foto1.jpg" alt="Foto Galeri 1" style="max-width: 100px;"></td>
                    <td>Deskripsi singkat tentang Galeri 1</td>
                    <td>Aktif</td>
                    <td>120</td>
                    <td>2023-01-01</td>
                    <td>2023-10-01</td>
                    <td>
                        <a href="{{ url('/galeriUpdate') }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td><a href="{{ url('/galeriDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai data galeri -->
            </tbody>
        </table>
    </div>
@endsection
