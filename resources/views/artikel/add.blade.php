@extends('layouts.mainAdmin')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataAdd.css') }}">
@endsection
@section ('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Tambah Artikel</h1>
        <form action="{{route('artikel.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Konten:</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>

            <div class="form-group">
                <label for="agenda_id"> Pilih Kegiatan :</label>
                <select class="form-control" id="agenda_id" name="agenda_id">
                    <option value="" disabled>Pilih Kegiatan</option>
                    @foreach($agendas as $agenda)
                        <option value="{{ $agenda->id }}">
                            {{ $agenda->event_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambahkan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/artikelStaff') }}'">Batal</button>
            </div>
        </form>
    </div>
@endsection

