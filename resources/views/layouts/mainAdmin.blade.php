<!-- views/layouts/mainAdmin.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Petung Park</title>
    <!-- Tambahkan Bootstrap CSS atau file CSS lainnya -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @yield('page-css') <!-- Optional: CSS tambahan khusus halaman -->
</head>
<body>
    @include('layouts.headerAdmin') <!-- Menyertakan header admin -->
    
    <main class="py-4">
        @yield('content') <!-- Tempat untuk konten halaman -->
    </main>

    <!-- Optional: Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.bundle.min.js"></script>
    @yield('page-js') <!-- Optional: JS tambahan khusus halaman -->
</body>
</html>
