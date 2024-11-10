@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
@endsection

@section('container-main')
    <!-- Bagian Judul -->
    <!-- <div class="title-section">
                        <h1 class="title">Petung Park</h1>
                        <p class="description">Mencari tempat jalan jalan yang ramah di kantong? Ada satu destinasi wisata yang tersembunyi di kota Mojokerto yang layak dipertimbangkan.
                            Lokasinya terletak di Trawas, menawarkan keindahan yang luar biasa. Alam yang masih asri, pemandangan yang menakjubkan, dan udara segar yang mengalir dengan alami akan
                            memberikan makna baru bagi liburanmu dan membantu merilekskan pikiran yang lelah.</p>
                    </div> -->
    <section>
        <div class="slider-container">
            <div class="slider">
                @foreach ($sliderHomes as $slide)
                    <div class="slide" style="background-image: url('{{ asset($slide->gallery->photo_link) }}')">
                        <h1 class="title">{{ $slide->gallery->name }}</h1>
                        <p class="description">{{ $slide->gallery->description }}</p>
                    </div>
                @endforeach
            </div>
            <div class="navigation">
                <button class="nav-button" id="prevBtn">❮</button>
                <button class="nav-button" id="nextBtn">❯</button>
            </div>
        </div>
    </section>
    
    <!-- Bagian Video -->
    <section>
        <div class="con-video">
            <iframe class="video-frame" 
                src="https://www.youtube.com/embed/wq8MRjtlkxQ" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
    </section>

    <!-- Bagian Sejarah -->
    <section class="bg-success text-white text-center py-5">
        <div class="container">
            <h2 class="title-beranda">SEJARAH</h2>
            <p class="desc-beranda mt-4">Petung Park berada di Desa Belik, kata “Belik”
                memiliki arti mata air kecil. Seperti namanya, Desa
                Belik memang mempunyai banyak mata air kecil
                alami, salah satunya yang berada di hutan bambu
                Petung. Hutan bambu Petung memiliki luas sekitar
                3,5 hektar yang ditumbuhi pohon bambu Petung
                berusia ratusan tahun, bahkan perangkat Desa
                menyebut hutan bambu petung di Belik ini
                merupakan salah satu hutan bambu tertua di Jawa
                Timur.
            </p>
        </div>
    </section>

    <!-- Bagian Lokasi -->
    <section class="bg-location text-dark text-center py-5">
        <div class="container">
            <h2 class="title-beranda">LOKASI</h2>
            <div class="row justify-content-center mt-5">
                <div class="col">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.217618060445!2d112.61724131177796!3d-7.659736192324794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d92930acc995%3A0x820cde960a28c319!2sPETUNG%20PARK!5e0!3m2!1sid!2sid!4v1727851391086!5m2!1sid!2sid"
                        width="500" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="img-lokasi"></iframe>
                </div>
                <div class="col">
                    <div class="desc-beranda text-start">
                        <p>Jibru, Belik, Kec. Trawas, Kabupaten Mojokerto, Jawa Timur 61375</p>

                        <div class="row align-items-end">
                            <p><b>Telepon</b> : 0831-3281-9058
                                <br /><b>Jam</b> : 09.00 - 17.00
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <h2 class="title-konten mt-4">Denah Petung Park</h2>
            <div class="mt-4">
                <img src="/images/beranda/lokasi/denahImage.jpg" alt="Denah Petung Park" class="denah-image">
            </div> --}}
        </div>
    </section>

    <!-- Bagian Galeri -->
    <section class="bg-custom text-white text-center py-5">
        <div class="container">
            <h2 class="title-konten">GALERI</h2>
            <div class="row justify-content-center mt-4">
                @foreach ($galleryShows as $galleryShow)
                    <div class="col-md-4">
                        <div class="frame-image">
                            <img src="{{ $galleryShow->gallery->photo_link }}" alt="{{ $galleryShow->name }}" class="galeri-image">
                            <div class="content-container">
                                <p class="text-image">{{ $galleryShow->name }}</p>
                                <p class="desc-image">{{ $galleryShow->description }}</p>
                                <button class="like-button" data-gallery-id="{{ $galleryShow->gallery->id}}">
                                    <span id="like-count"
                                        class="{{ $galleryShow->gallery->number_love % 2 === 0 ? 'even' : 'odd' }}">{{ $galleryShow->gallery->number_love }}</span>
                                    <span class="like-icon">❤️</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('page-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const likeButtons = document.querySelectorAll('.like-button');
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            let currentIndex = 0;

            function updateSliderPosition() {
                const offset = -currentIndex * 100; // Calculate offset based on currentIndex
                slider.style.transform = `translateX(${offset}%)`; // Apply the transformation
            }

            nextBtn.addEventListener('click', function() {
                console.log("Next button clicked"); // Debugging
                currentIndex = (currentIndex + 1) % slides.length; // Move to the next slide
                updateSliderPosition();
            });

            prevBtn.addEventListener('click', function() {
                console.log("Prev button clicked"); // Debugging
                currentIndex = (currentIndex - 1 + slides.length) % slides
                    .length; // Move to the previous slide
                updateSliderPosition();
            });

            // Initial call to position the slider correctly on page load
            updateSliderPosition();

            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
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
                        body: JSON.stringify({
                            action: action
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        likeCount.textContent = data.number_love; // Update tampilan dengan nilai dari server
                        updateLikeCountDisplay(likeCount); // Update warna
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
