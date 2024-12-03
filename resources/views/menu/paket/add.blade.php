@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/paketAdd.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Tambah Paket</h1>
        <form action="{{ route('menu.paket.store') }}" method="post" enctype="multipart/form-data">
            @csrf 
            
            <div class="form-group">
                <label for="name">Nama Paket:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="recommendation">Rekomendasi:</label>
                <select class="form-control" id="recommendation" name="recommendation">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>

            <div class="form-group">
                <label for="menu">Menu:</label>
                <select class="form-control" id="menu" name="menu_id[]" multiple>
                    @foreach ($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambahkan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{route('menu.index') }}'">Batal</button>
            </div>
        </form>
    </div>
@endsection

@section('page-js')

@endsection
