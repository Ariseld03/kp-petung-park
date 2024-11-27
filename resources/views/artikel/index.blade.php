@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataStaff.css') }}">
@endsection

@section ('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Daftar Wisata</h1>
        <a href="{{ route('wisata.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Wisata</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Jumlah Like</th>
                    <th>Gambar</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wisatas as $wisata)
                <tr>
                    <td>{{ $wisata->name }}</td>
                    <td>{{ $wisata->description }}</td>
                    <td>{{ $wisata->status }}</td>
                    <td>{{ $wisata->number_love }}</td>
                    <td>
                    @if ($wisata->galleries->isNotEmpty())
                        @foreach ($wisata->galleries as $gallery)
                            <img src="{{ asset($gallery->photo_link) }}" alt="Foto" style="max-width: 100px;">
                        @endforeach
                    @else
                        Tidak ada foto
                    @endif
                    </td>
                    <td>{{ $wisata->created_at->format('d-m-Y') }}</td>
                    <td>{{ $wisata->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('wisata.edit', $wisata->id) }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td>
                         <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $wisata->id }}, {{ $wisata->status }})">
                            Nonaktif
                        </button>
                        <div class="modal fade" id="hapusModal-{{ $wisata->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $wisata->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $wisata->id }}">Konfirmasi Nonaktif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalMessage-{{ $wisata->id }}">
                                        Apakah Anda yakin ingin mengubah status data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" id="nonaktifForm-{{ $wisata->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
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
    </div>
@endsection

@section('page-js')
    <script>
        function handleNonaktif(wisataId, status) {
            var modalMessage = document.getElementById('modalMessage-' + wisataId);
            var nonaktifForm = document.getElementById('nonaktifForm-' + wisataId);
            
            if (status === 0) {
                modalMessage.innerHTML = "wisata ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }
            $('#hapusModal-' + wisataId).modal('show');
        }

        $(document).ready(function() {
            @if(session('success'))
                $('#BerhasilModal').modal('show');
            @endif
        });
    </script>
@endsection

