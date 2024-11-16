<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/staffUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Pembaruan Staff</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center text-success">Pembaruan Staff</h1>
        <form>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="tanggalLahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
            </div>

            <div class="form-group">
                <label for="nomorTelepon">Nomor Telepon:</label>
                <input type="tel" class="form-control" id="nomorTelepon" name="nomorTelepon" required>
            </div>

            <div class="form-group">
                <label for="posisi">Posisi:</label>
                <select class="form-control" id="posisi" name="posisi">
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                    <option value="User">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jenisKelamin">Jenis Kelamin:</label>
                <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="0">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                </select>
            </div>

            <button class="btn btn-success" type="submit" onclick="location.href='{{ url('/staffShow') }}'">Simpan Perubahan</button>
            <button class="btn btn-secondary" type="button" onclick="location.href='{{ url('/staffShow') }}'">Kembali</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
