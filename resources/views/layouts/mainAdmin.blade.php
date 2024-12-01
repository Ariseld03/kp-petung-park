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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @yield('content') <!-- Tempat untuk konten halaman -->
    </main>

    <!-- Optional: Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @if(session('success'))
        <div class="modal fade" id="BerhasilModal" tabindex="-1" role="dialog" aria-labelledby="BerhasilModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="BerhasilModalLabel">Berhasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="$('#BerhasilModal').modal('hide');">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @yield('page-js') <!-- Optional: JS tambahan khusus halaman -->
</body>
</html>
