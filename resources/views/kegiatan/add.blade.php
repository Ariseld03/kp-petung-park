@extends('layouts.mainAdmin')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanAdd.css') }}">
@endsection
@section('content')
<body>
    <div class="container mt-5">
        <br>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <br>
        <h1 class="text-center text-success">Tambah Kegiatan</h1>
        <form action="{{ route('kegiatan.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambahkan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('kegiatan.index') }}'">Batal</button>
            </div>
        </form>
    </div>
</body>
