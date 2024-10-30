<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/staffAdd.css') }}"> <!-- Menghubungkan file CSS -->
    <title>Tambah Staff</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Staff</h1>
        <form action="{{ url('/staffStore') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="dob">Tanggal Lahir:</label>
            <input type="date" id="dob" name="date_of_birth" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone_number" required>

            <label for="position">Posisi:</label>
            <select id="position" name="position" required>
                <option value="Admin">Admin</option>
                <option value="Staff">Staff</option>
                <option value="Manager">Manager</option>
            </select>

            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" required>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>

            <button type="submit" class="btn-simpan" onclick="location.href='{{ url('/staffShow') }}'">Tambahkan</button>
            <button type="button" class="btn-kembali" onclick="location.href='{{ url('/staffShow') }}'">Kembali</button>
        </form>
    </div>
</body>
</html>
