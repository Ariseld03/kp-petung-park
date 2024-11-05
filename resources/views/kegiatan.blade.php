@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanStaff.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Kegiatan</h1>
        <a href="{{ url('/kegiatanAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Kegiatan</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Email Staff</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh data kegiatan, dapat diulang sesuai kebutuhan -->
                <tr>
                    <td>Contoh Kegiatan 1</td>
                    <td>2023-01-01</td>
                    <td>2023-01-05</td>
                    <td>Lokasi Contoh</td>
                    <td>Aktif</td>
                    <td>Deskripsi singkat kegiatan 1</td>
                    <td>2023-01-01</td>
                    <td>2023-01-02</td>
                    <td>staff@example.com</td>
                    <td><a href="{{ url('/kegiatanUpdate') }}" class="btn btn-primary">Perbarui</a></td>
                    <td><a href="{{ url('/kegiatanDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai data kegiatan -->
            </tbody>
        </table>
    </div>
@endsection

@section('page-js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
