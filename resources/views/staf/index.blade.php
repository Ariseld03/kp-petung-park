@extends('layouts.mainAdmin')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/staffShow.css') }}">
@endsection
@section('content')

<div class="container-fluid mt-5">
    <h1 class="text-center" style="color: #557C56;">Tabel Pegawai</h1>
    <a href="{{ route('staf.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Pegawai</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Tgl Lahir</th>
                    <th>No. Telp</th>
                    <th>Posisi</th>
                    <th>J. Kelamin</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffs as $pegawai)
                    <tr>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->name }}</td>
                        <td>
                            @if (isset($pegawai->gallery) && $pegawai->gallery->photo_link !== null)
                                <img src="{{ asset($pegawai->gallery->photo_link) }}" alt="Foto" style="max-width: 100px;">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $pegawai->date_of_birth }}</td>
                        <td>{{ $pegawai->phone_number }}</td>
                        <td>{{ $pegawai->position }}</td>
                        <td>{{ $pegawai->gender }}</td>
                        <td>{{ $pegawai->status ? 'Aktif' : 'Non-Aktif' }}</td>
                        <td>{{ $pegawai->created_at }}</td>
                        <td>{{ $pegawai->updated_at }}</td>
                        <td>
                            <a href="{{ route('staf.edit', ['user' => $pegawai->id]) }}" class="btn btn-primary mb-1">Perbarui</a>
                            <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $pegawai->id }}, {{ $pegawai->status }})">
                                Nonaktif
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('page-js')
@if(session('success'))
    <script>
        $(document).ready(function() {
            $('#berhasilModal').modal('show');
        });
    </script>
@endif
<script>
    function handleNonaktif(galleryId, status) {
        var modalMessage = document.getElementById('modalMessage-' + galleryId);
        var nonaktifForm = document.getElementById('nonaktifForm-' + galleryId);

        if (status === 0) {
            modalMessage.innerHTML = "Staff ini sudah nonaktif.";
            nonaktifForm.querySelector("button[type='submit']").disabled = true;
        } else {
            modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
            nonaktifForm.querySelector("button[type='submit']").disabled = false;
        }

        $('#hapusModal-' + galleryId).modal('show');
    }
</script>
@endsection
