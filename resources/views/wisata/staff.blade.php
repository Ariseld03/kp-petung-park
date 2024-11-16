@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataStaff.css') }}">
@endsection

@section ('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Daftar Wisata</h1>
        <a href="{{ url('/wisataAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Wisata</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Wisata A</td>
                    <td>Deskripsi Wisata A</td>
                    <td>Aktif</td>
                    <td>01-01-2024</td>
                    <td>05-01-2024</td>
                    <td>
                        <button class="btn btn-primary" onclick="location.href='{{ url('/wisataUpdate') }}'">Perbarui</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="location.href='{{ url('/wisataDelete') }}'">Hapus</button>
                    </td>
                </tr>
                <!-- Tambahkan lebih banyak baris sesuai data wisata -->
            </tbody>
        </table>
    </div>
@endsection

@section('js-code')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
