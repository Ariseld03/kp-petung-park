@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/wisata.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Wisata -->
    <div class="kategori-wisata">
        <div class="kategori-header">
            <a href="{{ url('layanan') }}" class="btn-kembali">Kembali</a>
            <h2>{{ $travel->name }}</h2>
        </div>
        <div class="wisata-container">
            <p>{{ $travel->description }}</p>
        </div>
        
        <!-- Galeri -->
        <div class="galeri-container">
            <div class="galeri-grid">
                @forelse($galleries as $gallery)
                    <div class="galeri-item">
                        <img src="{{ $gallery->photo_link }}" alt="{{ $gallery->name }}">
                        <p>{{ $gallery->name }}</p>
                        <p>{{ $gallery->description }}</p>
                        <button id="like-button" class="like-button" data-gallery-id="{{ $gallery->id }}">
                            ❤️ <span id="like-count" style="color: red;">{{ $gallery->number_love }}</span>
                        </button>
                    </div>
                @empty
                    <p>Tidak ada gambar yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const likeButtons = document.querySelectorAll('.like-button');
    
            likeButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const likeCount = button.querySelector('#like-count');
                    let currentLikes = parseInt(likeCount.textContent);
                    const galleryId = button.dataset.galleryId;
    
                    // Cek apakah jumlah saat ini genap atau ganjil
                    if (currentLikes % 2 === 0) {
                        // Jika genap, kurangi like
                        currentLikes -= 1;
                        likeCount.textContent = currentLikes;
    
                        // Mengupdate like di database
                        fetch(`/gallery/${galleryId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ action: 'decrement' }) // Tambahkan action untuk pengurangan
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                            console.log("Like dikurangi!");
                        })
                        .catch(error => {
                            console.error("Ada kesalahan saat mengurangi like:", error);
                        });
                    } else {
                        // Jika ganjil, tambahkan like
                        currentLikes += 1;
                        likeCount.textContent = currentLikes;
    
                        // Mengupdate like di database
                        fetch(`/gallery/${galleryId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ action: 'increment' }) // Tambahkan action untuk penambahan
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                            console.log("Like ditambahkan!");
                        })
                        .catch(error => {
                            console.error("Ada kesalahan saat menambahkan like:", error);
                        });
                    }
                });
            });
        });
    </script>
    
    