@extends('layouts.mainAdmin')
@section('content')

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
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
        <h1 class="text-center" style="color: #557C56;">Tabel pegawai</h1>
        <a href="{{ route('staf.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah pegawai</a>
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
                        <td>
                            @if (isset($pegawai->gallery) && $pegawai->gallery->photo_link !== null)
                                <img src="{{ asset($pegawai->gallery->photo_link) }}" alt="Foto Galeri 1" style="max-width: 100px;">
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
                        <a href="{{ route('staf.edit', ['user' => $pegawai->id]) }}" class="btn btn-primary">Perbarui</a>
                        </td>
                        <td>
                            <!-- Button to trigger the nonaktif modal check -->
                        <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $pegawai->id }}, {{ $pegawai->status }})">
                            Nonaktif
                        </button>

                        <!-- Modal for nonaktif confirmation -->
                        <div class="modal fade" id="hapusModal-{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $pegawai->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $pegawai->id }}">Konfirmasi Nonaktif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="modalMessage-{{ $pegawai->id }}">
                                        Apakah Anda yakin ingin mengubah status data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('staf.destroy', $pegawai->id) }}" method="POST" id="nonaktifForm-{{ $pegawai->id }}">
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
@if(session('success'))
    <script>
        $(document).ready(function() {
            $('#berhasilModal').modal('show');
        });
    </script>
@endif
<script>
        // Function to handle the nonaktif process
        function handleNonaktif(galleryId, status) {
            var modalMessage = document.getElementById('modalMessage-' + galleryId);
            var nonaktifForm = document.getElementById('nonaktifForm-' + galleryId);
            
            if (status === 0) {
                // If the gallery is already nonaktif, show a custom message in the modal and prevent form submission
                modalMessage.innerHTML = "Staff ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                // If the gallery is active, proceed to the normal nonaktif process
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }

            // Show the modal
            $('#hapusModal-' + galleryId).modal('show');
        }

    </script>
@endsection


