<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/wisataUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Update Wisata</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="judul">Update Wisata</h1>
        <form>
            <div class="form-group">
                <label for="nama">Nama Wisata:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <button type="button" class="btn btn-success" onclick="location.href='{{ url('/wisataStaff') }}'">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='{{ url('/wisataStaff') }}'">Kembali</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
