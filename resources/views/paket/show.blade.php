@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/paketShow.css') }}">
@endsection

@section('container-main')
<div class="kategori-wisata">
    <!-- Kategori Header for Paket -->
    <div class="kategori-header">
        <a href="{{ url('layanan') }}" class="btn-kembali">Kembali</a>
        <h2>{{ $paket->name }}</h2>
    </div>
    
    <div class="paket-detail">
        <!-- Foto Paket -->
        <div class="paket-photo">
            @php
                $photo = $paket->menus->isNotEmpty() ? $paket->menus->first()->gallery->photo_link : '/images/footer/logoPetungPark.png';
            @endphp
            <img src="{{ asset($photo) }}" alt="Foto {{ $paket->name }}" class="wisata-gambar">
        </div>
        
        <!-- Harga dan Like Count -->
        <p>Harga: Rp{{ number_format($paket->price, 0, ',', '.') }}</p>
        <p id="like-count">Jumlah Like: {{ $paket->number_love }}</p>

        <!-- Tombol Like -->
        <button id="like-button" onclick="addLike({{ $paket->id }})" class="like-button">
            ❤️ Like
        </button>

        <!-- Menu dalam Paket -->
        <h2>Menu dalam Paket:</h2>
        <ul class="menu-list">
            @forelse($paket->menus as $menu)
                <li>
                    <p><strong>Nama Menu:</strong> {{ $menu->name }}</p>
                    <p><strong>Deskripsi:</strong> {{ $menu->description }}</p>
                </li>
            @empty
                <li>Tidak ada menu dalam paket ini.</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function addLike(packageId) {
        fetch(`/paket/${packageId}/like`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('like-count').innerText = `Jumlah Like: ${data.newLikeCount}`;
            } else {
                alert('Gagal menambah like.');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection

