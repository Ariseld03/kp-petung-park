@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/wisataStaff.css') }}">
@endsection

@section ('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Daftar Artikel</h1>
        <a href="{{ route('artikel.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Artikel</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
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
                @foreach($artikels as $artikel)
                <tr>
                    <td>{{ $artikel->title }}</td>
                    <td>{{ Str::limit($artikel->content, 50) }}</td>
                    <td>{{ $artikel->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>{{ $artikel->likes_count }}</td>
                    <td>
                    @if ($artikel->images->isNotEmpty())
                        @foreach ($artikel->images as $image)
                            <img src="{{ asset($image->path) }}" alt="Foto" style="max-width: 100px;">
                        @endforeach
                    @else
                        Tidak ada foto
                    @endif
                    </td>
                    <td>{{ $artikel->created_at->format('d-m-Y') }}</td>
                    <td>{{ $artikel->updated_at->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-primary">Perbarui</a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $artikel->id }}, {{ $artikel->status }})">
                            Nonaktif
                        </button>
                        <div class="modal fade" id="hapusModal-{{ $artikel->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $artikel->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $artikel->id }}">Konfirmasi Nonaktif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalMessage-{{ $artikel->id }}">
                                        Apakah Anda yakin ingin mengubah status data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" id="nonaktifForm-{{ $artikel->id }}">
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
        function handleNonaktif(artikelId, status) {
            var modalMessage = document.getElementById('modalMessage-' + artikelId);
            var nonaktifForm = document.getElementById('nonaktifForm-' + artikelId);
            
            if (status === 0) {
                modalMessage.innerHTML = "Artikel ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }
            $('#hapusModal-' + artikelId).modal('show');
        }

        $(document).ready(function() {
            @if(session('success'))
                $('#BerhasilModal').modal('show');
            @endif
        });
    </script>
@endsection

