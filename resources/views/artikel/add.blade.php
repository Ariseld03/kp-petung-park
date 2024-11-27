@extends('layouts.mainAdmin')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataAdd.css') }}">
@endsection
@section ('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Tambah Wisata</h1>
        <form action="{{route('wisata.store') }}" method="post" enctype="multipart/form-data">
            @csrf <!-- Token untuk melindungi dari CSRF -->
            
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
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
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/wisataStaff') }}'">Batal</button>
            </div>
        </form>
    </div>
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
