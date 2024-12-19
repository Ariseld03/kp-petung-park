@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanUpdate.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Update Kegiatan</h1>
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="post">
            @csrf 
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kegiatan->event_name }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $kegiatan->event_start_date }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $kegiatan->event_end_date }}" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $kegiatan->event_location }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $kegiatan->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $kegiatan->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $kegiatan->description }}</textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('kegiatan.index') }}'">Kembali</button>
            </div>
        </form>
    </div>
@endsection

