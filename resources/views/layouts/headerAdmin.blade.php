<!-- views/layouts/headerAdmin.blade.php -->
<header>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #557C56;">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/staffShow') }}">Staff</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/galeri') }}">Galeri</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/menu') }}">Menu</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/wisataStaff') }}">Wisata</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kegiatan') }}">Kegiatan</a></li>
            </ul>
        </div>
    </nav>
</header>
