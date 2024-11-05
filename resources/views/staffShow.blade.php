@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/staffShow.css') }}">
@endsection

@section ('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Tabel Staff</h1>
        <a href="{{ url('/staffAdd') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Staff</a>
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th>Tanggal Lahir</th>
                    <th>Nomor Telepon</th>
                    <th>Posisi</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>staff1@example.com</td>
                    <td>Staff Satu</td>
                    <td>password1</td>
                    <td>1990-01-01</td>
                    <td>081234567890</td>
                    <td>Admin</td>
                    <td>Pria</td>
                    <td>Aktif</td>
                    <td>2023-01-01</td>
                    <td>2023-10-01</td>
                    <td><a href="{{ url('/staffUpdate') }}" class="btn btn-primary">Perbarui</a></td>
                    <td><a href="{{ url('/staffDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
                <tr>
                    <td>staff2@example.com</td>
                    <td>Staff Dua</td>
                    <td>password2</td>
                    <td>1992-02-02</td>
                    <td>082345678901</td>
                    <td>Staff</td>
                    <td>Wanita</td>
                    <td>Non-Aktif</td>
                    <td>2023-02-01</td>
                    <td>2023-10-02</td>
                    <td><a href="{{ url('/staffUpdate') }}" class="btn btn-primary">Perbarui</a></td>
                    <td><a href="{{ url('/staffDelete') }}" class="btn btn-danger">Hapus</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('page-js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
