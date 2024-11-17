xa<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/kegiatanUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Update Kegiatan</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Update Kegiatan</h1>
        <form action="{{ url('/kegiatanUpdate') }}" method="post">
            @csrf <!-- Token CSRF -->
            <div class="form-group">
                <label for="nama">Nama Kegiatan:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="email_staff">Email Staff:</label>
                <input type="email" class="form-control" id="email_staff" name="email_staff" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/kegiatan') }}'">Kembali</button>
            </div>
        </form>
    </div>
    @include('layouts.mainAdmin')
</body>
</html>
