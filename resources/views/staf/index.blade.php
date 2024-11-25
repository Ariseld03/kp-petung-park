@section('content')
    @if ($message = Session::get('Berhasil'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Tabel Staff</h1>
        <a href="{{ route('staf.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Staff</a>
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Foto</th>
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
                @foreach ($staffs as $pegawai)
                    <tr>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->name }}</td>
                        <td><img src="{{ asset($pegawai->gallery->photo_link) }}" alt="Foto Galeri 1" style="max-width: 100px;"></td>
                        <td>{{ $pegawai->date_of_birth }}</td>
                        <td>{{ $pegawai->phone_number }}</td>
                        <td>{{ $pegawai->position }}</td>
                        <td>{{ $pegawai->gender }}</td>
                        <td>{{ $pegawai->status ? 'Aktif' : 'Non-Aktif' }}</td>
                        <td>{{ $pegawai->created_at }}</td>
                        <td>{{ $pegawai->updated_at }}</td>
                        <td>
                        <a href="{{ route('staf.edit', ['email' => $pegawai->email]) }}" class="btn btn-primary">Perbarui</a>
                        </td>
                        <td>
                            <form action="{{ route('staf.delete', $pegawai->email) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.mainAdmin')

