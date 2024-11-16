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
            @foreach ($galleries as $galeri)
                <tr>
                    <td>{{$galeri->name}}</td>
                    <td><img src="{{ $galeri->photo_link }}" alt="Foto Galeri 1" style="max-width: 100px;"></td>
                    <td>{{$galeri->description}}</td>
                    <td>{{$galeri->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>{{$galeri->number_love}}</td>
                    <td>{{$galeri->created_at}}</td>
                    <td>{{$galeri->created_at}}</td>
                    <td>
                        <a href="{{ url('/galeriUpdate') }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td><a href="{{ url('/galeriDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
