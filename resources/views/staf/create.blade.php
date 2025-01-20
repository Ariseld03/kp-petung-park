@extends('layouts.mainAdmin')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/staffAdd.css') }}">
@endsection
@section('content')
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Tambah Staff/User</h1>
        <form action="{{ route('staf.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="email">
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required autocomplete="name">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="row mb-2">
            <div class="col-md-12">   
            <div class="form-group">             
                <label for="passwordConfirm">Konfirmasi Password Baru:</label>
                <input type="password" class="form-control" id="passwordConfirm" name="password_confirmation" placeholder="Masukkan Kembali Kata Sandi" required autocomplete="password">
            </div>
            </div>
            </div>

            <div class="form-group">
                <label for="dob">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="dob" name="date_of_birth" required value="2000-01-01">
            </div>

            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="tel" class="form-control" id="phone" name="phone_number" required autocomplete="tel">
            </div>

            <div class="form-group">
                <label for="position">Posisi:</label>
                <select class="form-control" id="position" name="position" required>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                    <option value="User">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">Foto:</label>
                <select class="form-control" id="photo" name="photo">
                    <option value="" selected disabled>Pilih Foto Baru</option>
                    @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}" data-img-src="{{ asset($gallery->photo_link) }}">
                                {{ $gallery->name }}
                            </option>
                    @endforeach
                </select>
                <br>
                <div id="preview-photo" class="text-center">
                    <img src="" style="max-width: 100px; display: none;">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambahkan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('staf.index') }}'">Kembali</button>
            </div>
        </form>
    </div>
</body>
@endsection
@section('page-js')
<script>
     document.getElementById('photo').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var imgSrc = selectedOption.dataset.imgSrc;
            var imgElement = document.querySelector('#preview-photo img');
            if (imgSrc) {
                imgElement.src = imgSrc;
                imgElement.style.display = 'block';
            } else {
                imgElement.style.display = 'none';
            }
        });
</script>
@endsection
