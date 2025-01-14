@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanUpdate.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Update Data Generic</h1>
        <form action="{{ route('generic.update',['generic' => $generic->id]) }}" method="post">
        @csrf 
            
            <div class="form-group">
                <label for="key">Kata Kunci:</label>
                <input type="text" class="form-control" id="key" name="key" value="{{ old('name', $generic->key) }}" required>
                @error('key')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="old_photo">Foto Saat Ini:</label>
                <div class="col-md-4">
                    <img src="{{ asset($generic->icon_picture_link) }}" id="old_photo" name = "old_photo" alt="Foto sebelumnya" style="max-width: 100px;">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                <label for="photo">Upload Foto Baru:</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" accept=".jpg, .jpeg, .png">
                    @error('photo')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          
            <div class="form-group">
                <label for="value">Isi:</label>
                <input type="text" class="form-control" id="value" name="value" value = "{{ old('value', $generic->value) }}" required>
                @error('value')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1" {{ old('status', $generic->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $generic->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Perbarui</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ route('generic.index') }}'">Batal</button>
        </form>
    </div>
@endsection

