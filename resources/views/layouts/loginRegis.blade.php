<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petung Park</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @yield('page-css') 
</head>
<body>
    @yield('container-main')
    @yield('page-js') 
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
