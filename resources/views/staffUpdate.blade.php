<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staffUpdate.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Pembaruan Staff</title>
</head>
<body>
    <div class="container">
        <h1>Pembaruan Staff</h1>
        <form>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>

            <label for="tanggalLahir">Tanggal Lahir:</label>
            <input type="date" id="tanggalLahir" name="tanggalLahir" required>
            <br>

            <label for="nomorTelepon">Nomor Telepon:</label>
            <input type="tel" id="nomorTelepon" name="nomorTelepon" required>
            <br>

            <label for="posisi">Posisi:</label>
            <select id="posisi" name="posisi">
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
                <option value="User">User</option>
            </select>
            <br>

            <label for="jenisKelamin">Jenis Kelamin:</label>
            <select id="jenisKelamin" name="jenisKelamin">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
            <br>

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="0">Tidak Aktif</option>
                <option value="1">Aktif</option>
            </select>

            <button class ="btn-simpan" type="submit" onclick="location.href='{{ url('/staffShow') }}'">Simpan Perubahan</button>
            <button class="btn-kembali" type="button" onclick="location.href='{{ url('/staffShow') }}'">Kembali</button>
        </form>
    </div>
</body>
</html>
