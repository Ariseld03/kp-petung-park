<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/galeriUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Perbarui Galeri</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Perbarui Galeri</h1>
        
        <!-- Display validation errors as alert -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('galeri.update', ['gallery' => $gallery->id]) }}" method="post" enctype="multipart/form-data">
            @csrf <!-- Tambahkan token CSRF untuk keamanan -->
            
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $gallery->name) }}" required>
                @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Foto Saat Ini:</label>
                <div class="col-md-4">
                    <img src="{{ asset($gallery->photo_link) }}" id="old_photo" alt="Foto sebelumnya" style="max-width: 100px;">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <input type="file" class="form-control-file" id="photo" name="photo" accept=".jpg, .jpeg, .png">
                    @error('photo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $gallery->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ old('status', $gallery->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $gallery->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="number_love">Jumlah Like:</label>
                <input type="number" class="form-control" id="number_love" name="number_love" value="{{ old('number_love', $gallery->number_love) }}" required>
                @error('number_love')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Perbarui</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('galeri.index') }}'">Batal</button>
        </form>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>