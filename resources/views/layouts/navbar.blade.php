<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #295A3F;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-4">
                    <a class="nav-link fs-3" href="{{ url('/beranda') }}" style="color: #fff;">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="{{ url('/layanan') }}" style="color: #fff;">Wisata</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link fs-3" href="{{ url('/agenda') }}" style="color: #fff;">Agenda Kegiatan</a>
                </li>
                <li class="nav-item ms-4">
                    <a class="nav-link fs-3" href="{{ url('/tentangKami') }}" style="color: #fff;">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link:hover {
        color: #000; /* Mengubah warna teks menjadi hitam saat hover */
        background: none; /* Menghapus latar belakang */
    }
</style>
