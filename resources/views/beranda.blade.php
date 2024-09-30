@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
@endsection
@section('container-main')
    <!-- Bagian Judul -->
    <div class="title-section">
        <h1 class="title">Petung Park</h1>
        <p class="description">Mencari tempat jalan jalan yang ramah di kantong? Ada satu destinasi wisata yang tersembunyi di kota Mojokerto yang layak dipertimbangkan. Lokasinya terletak di Trawas, menawarkan keindahan yang luar biasa. Alam yang masih asri, pemandangan yang menakjubkan, dan udara segar yang mengalir dengan alami akan memberikan makna baru bagi liburanmu dan membantu merilekskan pikiran yang lelah.</p>
    </div>

    <!-- Bagian Sejarah -->
    <section class="bg-success text-white text-center py-5">
        <div class="container">
            <h2 class="title-sejarah">Sejarah</h2>
            <p class="desc-sejarah">Rencana pembangunan sudah sejak 2019 untuk menjadikan Desa Belik yang berbatasan dengan Pasuruan menjadi tempat wisata.
                Pada 2021 munculah ide untuk menjadikan hutan bambu sebagai tempat wisata.
                Dan akhirnya dibuka lah pada 18 November 2022.
            </p>
        </div>
    </section>

    <!-- Bagian Lokasi -->
    <section class="bg-location text-dark text-center py-5">
        <div class="container">
            <h2 class="title-konten">Lokasi Petung Park</h2>
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <img src="/images/beranda/lokasi/lokasiImage.jpg" alt="Lokasi Petung Park" class="img-lokasi">
                </div>
                <div class="desc-lokasi">
                    <p>Jibru, Belik, Kec. Trawas, Kabupaten Mojokerto, Jawa Timur 61375</p>
                    <p>0831-3281-9058</p>
                    <p>009.00 - 17.00</p>
                </div>
            </div>
            <h2 class="title-konten">Denah Petung Park</h2>
            <div class="mt-4">
                <img src="/images/beranda/lokasi/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
            </div>
        </div>
    </section>

    <!-- Bagian Galeri -->
    <section class="bg-custom text-white text-center py-5">
        <div class="container">
            <h2 class="title-konten">Galeri</h2>
            <div class="row justify-content-center mt-4">
                @foreach($galleryShows as $galleryShow)
                    <div class="col-md-3">
                        <div class="frame-image">
                            <img src="{{ $galleryShow->photo_link }}" alt="{{ $galleryShow->name }}" class="galeri-image">
                            <p class="text-image">{{ $galleryShow->name }}</p>
                            <p class="desc-image">{{ $galleryShow->description }}</p>
                            <!-- Tombol Like dan Jumlah Like -->
                            <button class="like-button" data-gallery-id="{{ $galleryShow->gallery_id }}">
                                <span id="like-count" class="{{ $galleryShow->number_love % 2 === 0 ? 'even' : 'odd' }}">{{ $galleryShow->number_love }}</span>
                                <span class="like-icon">❤️</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('page-js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-button');

    likeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const likeCount = button.querySelector('#like-count');
            let currentLikes = parseInt(likeCount.textContent);
            const galleryId = button.dataset.galleryId;

            // Toggle logic untuk like
            let action = currentLikes % 2 === 0 ? 'increment' : 'decrement';

            // Update like di database
            fetch(`/gallery/${galleryId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ action: action })
            })
            .then(response => response.json())
            .then(data => {
                likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                updateLikeCountDisplay(likeCount); // Update warna
                console.log("Like updated!");
            })
            .catch(error => {
                console.error("Ada kesalahan saat mengubah like:", error);
            });
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
@endsection
