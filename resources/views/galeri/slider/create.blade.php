@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/paketAdd.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Tambah Tampilan Home Slider</h1>
        <form action="{{ route('galeri.slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <div class="form-group">
                <label for="name">Nama Tampilan Slider:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="photo">Pilih Galeri untuk ditampilkan di slider Home :</label>

                <select class="form-control" id="photo" name="photo" required >
                    <option value="" selected disabled>Pilih Galeri</option>
                    @foreach ($galleries as $gallery)
                        <option value="{{ $gallery->id }}" data-img-src="{{ asset($gallery->photo_link) }}">
                            {{ $gallery->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <div id="preview-photo" class="text-center">
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Tambahkan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{route('galeri.slider.index') }}'">Batal</button>
            </div>
        </form>
    </div>
@endsection
@section('page-js')
<script>
    document.getElementById('photo').addEventListener('change', function() {
        var previewContainer = document.getElementById('preview-photo');
        previewContainer.innerHTML = ''; // Clear previous previews
        Array.from(this.selectedOptions).forEach(option => {
            var imgSrc = option.dataset.imgSrc;
            if (imgSrc) {
                var imgElement = document.createElement('img');
                imgElement.src = imgSrc;
                imgElement.style.maxWidth = '100px';
                imgElement.style.margin = '5px';
                previewContainer.appendChild(imgElement);
            }
        });
    });
</script>
@endsection


