@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/paketAdd.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Update Paket</h1>
        <form action="{{ route('menu.paket.update', $package->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Nama Paket:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $package->price }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $package->status ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$package->status ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="number_love">Jumlah Like :</label>
                <input type="number" class="form-control" id="number_love" name="number_love" value="{{ $package->number_love }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('menu.index') }}'">Kembali</button>
        </form>
    </div>
@endsection

