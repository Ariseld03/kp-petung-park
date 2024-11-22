@extends('layouts.main')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/wisata.css') }}">
@endsection

@section('container-main')
    <!-- Kategori Wisata -->
    <div class="kategori-wisata">
        <div class="kategori-header">
            <a href="{{ route('layanan') }}" class="btn-kembali">Kembali</a>
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
                        <img id="alam_{{ $gallery->id }}" class="zoomimg" src="{{ $gallery->photo_link }}"
                            alt="{{ $gallery->name }}">
                        <p>{{ $gallery->name }}</p>
                        <p id="text_alam_{{ $gallery->id }}">{{ $gallery->description }}</p>
                        <div class="like-container">
                            <button class="like-button" data-gallery-id="{{ $gallery->id }}">
                                <span id="like-count"
                                    class="{{ $gallery->number_love % 2 === 0 ? 'even' : 'odd' }}">{{ $gallery->number_love }}</span>
                                <span class="like-icon">❤️</span>
                            </button>
                        </div>
                    </div>
                @empty
                    <p style="color: white;">Tidak ada gambar yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@include('layouts.modalimg')

@section('page-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const likeButtons = document.querySelectorAll('.like-button');
            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const likeCount = button.querySelector('#like-count');
                    let currentLikes = parseInt(likeCount.textContent);
                    const galleryId = button.dataset.galleryId;
                    const travelId = "{{ $travel->id }}";

                    // Send request to toggle like in the backend
                    fetch(`/wisata/like/${galleryId}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            likeCount.textContent = data.number_love;
                            updateLikeCountDisplay(likeCount);
                        })
                        .catch(error => {
                            console.error("Error updating like:", error);
                        });
                });
            });

            // Update the like count's style based on odd/even value
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
    <script src="{{ asset('/js/imagemodal.js') }}"></script>
@endsection
