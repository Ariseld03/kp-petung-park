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
                        <div class="like-container">
                            <button class="like-button" data-gallery-id="{{ $gallery->id }}">
                                <span id="like-count" class="{{ $gallery->number_love % 2 === 0 ? 'even' : 'odd' }}">{{ $gallery->number_love }}</span>
                                <span class="like-icon">❤️</span>
                            </button>
                        </div>
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
    
                    // Toggle logic untuk like
                    if (currentLikes % 2 === 0) {
                        // Jika genap, tambahkan like
                        currentLikes += 1;
                        likeCount.textContent = currentLikes;
    
                        // Update like di database
                        fetch(`/gallery/${galleryId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ action: 'increment' }) // Aksi untuk penambahan
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                            updateLikeCountDisplay(likeCount); // Update warna
                            console.log("Like ditambahkan!");
                        })
                        .catch(error => {
                            console.error("Ada kesalahan saat menambahkan like:", error);
                        });
                    } else {
                        // Jika ganjil, kurangi like
                        currentLikes -= 1;
                        likeCount.textContent = currentLikes;
    
                        // Update like di database
                        fetch(`/gallery/${galleryId}/like`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({ action: 'decrement' }) // Aksi untuk pengurangan
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                            updateLikeCountDisplay(likeCount); // Update warna
                            console.log("Like dikurangi!");
                        })
                        .catch(error => {
                            console.error("Ada kesalahan saat mengurangi like:", error);
                        });
                    }
                });
            });
    
            function updateLikeCountDisplay(likeCount) {
                const count = parseInt(likeCount.textContent);
                if (count % 2 === 0) {
                    likeCount.classList.remove('odd');
                    likeCount.classList.add('even');
                } else {
                    likeCount.classList.remove('even');
                    likeCount.classList.add('odd');
                }
            }
        });
    </script>
    