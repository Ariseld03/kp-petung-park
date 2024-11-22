@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/beranda.css') }}">
@endsection

@section('container-main')
    <section>
        <div class="slider-container">
            <div class="slider">
                @foreach ($sliderHomes as $slide)
                    <div class="slide" style="background-image: url('{{ asset($slide->gallery->photo_link) }}')">
                        <h1 class="title text">{{ $slide->gallery->name }}</h1>
                        <p class="description text">{{ $slide->gallery->description }}</p>
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
    <section class="m-5">
        <div class="con-video">
            <iframe class="video-frame" src="{{ $info['video_promosi'] }}" title="YouTube Video Player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </section>

    <!-- Bagian Sejarah -->
    <section class="bg-success text-white text-center py-5">
        <div class="container">
            <h2 class="title-beranda">SEJARAH</h2>
            <p class="desc-beranda mt-4">{{ $info['sejarah'] }}
            </p>
        </div>
    </section>

    <!-- Bagian Lokasi -->
    <section class="bg-location text-dark text-center py-5">
        <div class="container">
            <h2 class="title-beranda">LOKASI</h2>
            <div class="row justify-content-center mt-5">
                <div class="col">
                    <iframe src="{{ $info['peta_lokasi'] }}" width="500" height="400" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        class="img-lokasi"></iframe>
                </div>
                <div class="col">
                    <div class="desc-beranda text-start">
                        <p>{{ $info['alamat'] }}</p>
                        <div class="row align-items-end">
                            <p>
                                <img src="{{ asset($info['telepon_logo']) }}" alt="Logo Telepon" class="whatsapp-logo">
                                <b> Telepon</b> : {{ $info['telepon'] }}
                                <br />
                                <img src="{{ asset($info['jam_logo']) }}" alt="Logo Jam" class="jam-logo">
                                <b> Jam</b> : {{ $info['jam'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bagian Galeri -->
    <section class="bg-custom text-white text-center py-5">
        <div class="container">
            <h2 class="title-beranda">GALERI</h2>
            <div class="row justify-content-center mt-4">
                @foreach ($galleryShows as $galleryShow)
                    <div class="col-md-4 overflow-hidden">
                        <div class="frame-image">
                            <img id="{{ $galleryShow->id }}" src="{{ asset($galleryShow->gallery->photo_link) }}"
                                alt="{{ $galleryShow->name }}" class="galeri-image zoomimg">
                            <div class="content-container">
                                <p id="text_{{ $galleryShow->id }}" class="text-image">{{ $galleryShow->name }}</p>
                                <p class="desc-image">{{ $galleryShow->description }}</p>
                                <button class="like-button" data-gallery-id="{{ $galleryShow->gallery->id }}">
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
@include('layouts.modalimg')

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

            // Auto-slide functionality
            const autoSlideInterval = 3000; // Change slide every 3 seconds

            function autoSlide() {
                currentIndex = (currentIndex + 1) % slides.length; // Move to the next slide
                updateSliderPosition();
            }

            // Start auto-slide
            let autoSlideTimer = setInterval(autoSlide, autoSlideInterval);

            // Pause auto-slide on hover
            document.querySelector('.slider-container').addEventListener('mouseover', () => {
                clearInterval(autoSlideTimer); // Stop auto-slide
            });

            document.querySelector('.slider-container').addEventListener('mouseout', () => {
                autoSlideTimer = setInterval(autoSlide, autoSlideInterval); // Resume auto-slide
            });

            likeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const likeCount = button.querySelector('#like-count');
                    let currentLikes = parseInt(likeCount.textContent);
                    const galleryId = button.dataset.galleryId;

                    // Toggle logic untuk like
                    let action = currentLikes % 2 === 0 ? 'increment' : 'decrement';

                    // Update like di database
                    fetch(`/galeri/${galleryId}/like`, {
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
                            likeCount.textContent = data
                                .number_love; // Update tampilan dengan nilai dari server
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
    <script src="{{ asset('/js/imagemodal.js') }}"></script>
@endsection
