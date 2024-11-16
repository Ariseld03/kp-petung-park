@extends('layouts.mainAdmin') <!-- Using mainAdmin layout -->

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/galeri.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Galeri</h1>
        <a href="{{ route('galeri.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Foto</a>
        <table class="table table-bordered">
            <thead class="thead-dark" style="background-color: #557C56; color: #FFFBE6;">
                <tr>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Banyak Like</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($galleries as $galeri)
                <tr>
                    <td>{{ $galeri->name }}</td>
                    <td><img src="{{ $galeri->photo_link }}" alt="Foto Galeri 1" style="max-width: 100px;"></td>
                    <td>{{ $galeri->description }}</td>
                    <td>{{ $galeri->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>{{ $galeri->number_love }}</td>
                    <td>{{ $galeri->created_at }}</td>
                    <td>{{ $galeri->updated_at }}</td>
                    <td>
                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal-{{ $galeri->id }}">Hapus</button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="hapusModal-{{ $galeri->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $galeri->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $galeri->id }}">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('galeri.destroy', $galeri->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Berhasil Modal -->
        @if(session('Berhasil'))
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
                        {{ session('Berhasil') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection
@section('page-js')
    <script>
        $(document).ready(function() {
            @if(session('Berhasil'))
                $('#BerhasilModal').modal('show');
            @endif
        });
    </script>
@endsection
