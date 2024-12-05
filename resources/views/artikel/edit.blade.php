@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataUpdate.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="judul">Update Artikel</h1>
        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $artikel->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Konten:</label>
                <textarea class="form-control" id="content" name="content" rows="4" required>{{ $artikel->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="aktif" {{ $artikel->status == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ $artikel->status == '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/artikelStaff') }}'">Kembali</button>
        </form>
    </div>
@endsection

