@extends('layouts.mainAdmin')
@section('content')
    <div class="container mt-5">
        <h1 class="judul">Update Wisata</h1>
        <form action="{{ route('wisata.update', $wisata->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="name">Nama Wisata:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $wisata->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $wisata->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $wisata->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $wisata->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="old_photos">Foto Saat Ini:</label>
                <div class="col-md-4 d-flex align-items-center justify-content-center" style="flex-wrap: wrap;">
                @foreach($wisata->galleries as $gallery)
                    <div style="margin: 10px; display: flex; align-items: center;">
                        <label for="old_photo_name" style="margin-right: 10px;">{{ $gallery->name }}</label>
                        <img src="{{ asset($gallery->photo_link) }}" id="old_photo" alt="Foto sebelumnya" style="max-width: 100px; margin-left: 10px;">
                    </div>
                @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="new_photos">Foto Baru:</label>
                <select class="form-control" id="new_photos" name="new_photos[]" multiple>
                    <option value="" disabled>Pilih Foto</option>
                    @foreach($galleries as $gallery)
                        <option value="{{ $gallery->id }}" data-img-src="{{ asset($gallery->photo_link) }}">
                            {{ $gallery->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <div id="preview-new-photo" class="text-center">
                    <!-- Previews of selected photos will be dynamically added here -->
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('wisata.index') }}'">Kembali</button>
        </form>
    </div>
@endsection
@section('page-js')
<script>
       document.getElementById('new_photos').addEventListener('change', function() {
            var selectedOptions = this.selectedOptions;
            var previewContainer = document.getElementById('preview-new-photo');
            previewContainer.innerHTML = ''; // Clear previous previews

            Array.from(selectedOptions).forEach(option => {
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

