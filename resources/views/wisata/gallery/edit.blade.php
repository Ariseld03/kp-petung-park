@extends('layouts.mainAdmin')
@section('content')
    <div class="container mt-5">
        <h1 class="judul">Update Galeri Wisata</h1>
        <form action="{{ route('wisata.gallery.update')}}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="travel_id" value="{{ $selectedCollage->travel_id }}">
            <input type="hidden" name="gallery_id" value="{{ $selectedCollage->gallery_id }}">    
            <div class="form-group">
                <label for="name_collage">Nama Kolase:</label>
                <input type="text" class="form-control" id="name_collage" name="name_collage" value="{{ $selectedCollage->name_collage }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ $selectedCollage->status == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $selectedCollage->status == 0 ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="old_travel_name">Nama Wisata Saat Ini :</label>
                <div class="col-md-4 d-flex align-items-center justify-content-center" style="flex-wrap: wrap;">
                    @if ($selectedCollage->travel)
                        <div>
                            <label for="old_travel_name" >
                                {{ $selectedCollage->travel->name }}
                            </label>
                        </div>
                    @else
                        <p>No Travel data available.</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="new_travels">Nama Wisata Baru:</label>
                <select class="form-control" id="new_travels" name="new_travels[]" multiple>
                    <option value="" disabled>Pilih Foto</option>
                    @foreach($travels as $wisata)
                        <option value="{{ $wisata->id }}">
                            {{ $wisata->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="old_gallery_name">Nama Galeri Saat Ini :</label>
                <div class="col-md-4 d-flex align-items-center justify-content-center" style="flex-wrap: wrap;">
                    @if ($selectedCollage->gallery)
                        <div style="margin: 10px; display: flex; align-items: center;">
                            <label for="old_gallery_name" style="margin-right: 10px;">
                                {{ $selectedCollage->gallery->name }}
                            </label>
                            <img src="{{ asset($selectedCollage->gallery->photo_link) }}" width="100" height="100" style="object-fit: contain;" alt="Foto Galeri">
                        </div>
                    @else
                        <p>No Gallery data available.</p>
                    @endif
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
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('wisata.gallery.index') }}'">Kembali</button>
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

