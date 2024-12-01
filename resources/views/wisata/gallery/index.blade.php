@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kolaseStaff.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Daftar kolase</h1>
        <a href="{{ route('wisata.gallery.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah kolase</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Kolase</th>
                    <th>Status</th>
                    <th>Judul Kolase</th>
                    <th>Gambar Gallery</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($collages as $kolase)
                <tr>
                    <td>{{ $kolase->name_collage }}</td>
                    <td>{{ $kolase->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>
                    <td>{{ $kolase->travel->name }}</td>
                    <td>
                    @if ($kolase->gallery && !empty($kolase->gallery->photo_link))
                        <img src="{{ asset($kolase->gallery->photo_link) }}" alt="Foto" style="max-width: 100px;">
                    @else
                        Tidak ada foto
                    @endif
                    </td>
                    <td>{{ $kolase->created_at->format('d-m-Y') }}</td>
                    <td>{{ $kolase->updated_at->format('d-m-Y') }}</td>
                    <td>
                    <form action="{{ route('wisata.gallery.edit') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="travel_id" value="{{ $kolase->travel_id }}">
                        <input type="hidden" name="gallery_id" value="{{ $kolase->gallery_id }}">
                        <input type="hidden" name="name_collage" value="{{ $kolase->name_collage }}">
                        <input type="hidden" name="status" value="{{ $kolase->status }}">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                    </td>
                    <td>
                         <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $kolase->gallery_id }}, {{ $kolase->travel_id }}, {{ $kolase->status }})">
                            Nonaktif
                        </button>
                        <div class="modal fade" id="hapusModal-{{ $kolase->gallery_id }}-{{ $kolase->travel_id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $kolase->gallery_id }}-{{ $kolase->travel_id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $kolase->gallery_id }}-{{ $kolase->travel_id }}">Konfirmasi Nonaktif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalMessage-{{ $kolase->gallery_id }}-{{ $kolase->travel_id }}">
                                        Apakah Anda yakin ingin mengubah status data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('wisata.gallery.delete', ['gallery' => $kolase->gallery->id, 'travel' => $kolase->travel->id]) }}" method="POST" id="nonaktifForm-{{ $kolase->gallery_id }}-{{ $kolase->travel_id }}">
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
        // Ensure correct modal show on Nonaktif button click
        function handleNonaktif(galleryId, travelId, status) {
            var modalMessage = document.getElementById('modalMessage-' + galleryId + '-' + travelId);
            var nonaktifForm = document.getElementById('nonaktifForm-' + galleryId + '-' + travelId);
            
            if (status === 0) {
                modalMessage.innerHTML = "Kolase ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }
            // Show modal
            $('#hapusModal-' + galleryId + '-' + travelId).modal('show');
        }

        $(document).ready(function() {
            // Ensure modal close works properly (both button and X)
            $(document).on('click', '[data-dismiss="modal"], .close', function (e) {
                // Close the modal
                var modalId = $(this).closest('.modal').attr('id');
                $('#' + modalId).modal('hide');
            });

            @if(session('success'))
                $('#BerhasilModal').modal('show');
            @endif
        });
    </script>
@endsection
