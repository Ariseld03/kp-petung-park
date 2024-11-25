@extends('layouts.mainAdmin')
@section('content')
    <title>Hapus Staff</title>
    <div class="container mt-5">
        <h1 class="text-center text-danger">Hapus Staff</h1>
        <p class="text-center">Apakah Anda yakin ingin menghapus staff berikut?</p>

        <!-- Detail Staff yang ingin dihapus -->
        <div class="staff-details p-3 border rounded bg-light">
            <p><strong>Email:</strong> staff1@example.com</p>
            <p><strong>Nama:</strong> Staff Satu</p>
            <p><strong>Password:</strong> password1</p>
            <p><strong>Tanggal Lahir:</strong> 1990-01-01</p>
            <p><strong>Nomor Telepon:</strong> 081234567890</p>
            <p><strong>Posisi:</strong> Admin</p>
            <p><strong>Jenis Kelamin:</strong> Pria</p>
            <p><strong>Status:</strong> Aktif</p>
            <p><strong>Create Date:</strong> 2023-01-01</p>
            <p><strong>Update Date:</strong> 2023-10-01</p>
        </div>

        <div class="text-center mt-4">
            <form action="{{ route('staf.delete', ['email' => 'staff1@example.com']) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </form>
            <button class="btn btn-secondary" onclick="location.href='{{ route('staf.index') }}'">Tidak, Kembali</button>
        </div>
    </div>
@endsection

