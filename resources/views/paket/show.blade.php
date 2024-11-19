@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/paketShow.css') }}">
@endsection
@section('container-main')

<div class="paket-detail">
    <h1>{{ $paket->name }}</h1>
    <p><strong>Harga:</strong> Rp {{ number_format($paket->price, 0, ',', '.') }}</p>
    <p><strong>Jumlah Like:</strong> {{ $paket->number_love }}</p>

    <h2>Menu di dalam Paket:</h2>
    <ul class="menu-list">
        @forelse($paket->menus as $menu)
            <li>
                <p><strong>Nama Menu:</strong> {{ $menu->name }}</p>
                <p><strong>Deskripsi:</strong> {{ $menu->description }}</p>
                <p><strong>Harga:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            </li>
        @empty
            <li>Tidak ada menu dalam paket ini.</li>
        @endforelse
    </ul>
</div>

@endsection
