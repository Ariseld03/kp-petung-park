@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanStaff.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Kegiatan</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Email Staff</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kegiatan as $perkegiatan)
                    <tr>
                        <td>{{ $perkegiatan->event_name }}</td>
                        <td>{{ $perkegiatan->event_start_date }}</td>
                        <td>{{ $perkegiatan->event_end_date }}</td>
                        <td>{{ $perkegiatan->event_location }}</td>
                        <td>{{ $perkegiatan->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>{{ $perkegiatan->description }}</td>
                        <td>{{ $perkegiatan->created_at }}</td>
                        <td>{{ $perkegiatan->updated_at }}</td>
                        <td>{{ $perkegiatan->user->name }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="location.href='{{ route('kegiatan.edit', $perkegiatan->id)}}'">Perbarui</button>
                        </td>
                        <td> 
                            <button type="button" 
                                        class="btn btn-danger"  
                                        onclick="handleNonaktif({{ $perkegiatan->id }}, {{ $perkegiatan->status }})">
                                    Nonaktif
                            </button>
                            <div class="modal fade" id="hapusModal-{{ $perkegiatan->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $perkegiatan->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel-{{ $perkegiatan->id }}">Konfirmasi Nonaktif</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="modalMessage-{{ $perkegiatan->id }}">Apakah Anda yakin ingin mengubah status data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('kegiatan.unactive', ['kegiatan' => $perkegiatan->id]) }}" method="POST" id="nonaktifForm-{{ $perkegiatan->id }}">
                                                @csrf
                                                @method('POST')
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
       function handleNonaktif(agendaId, status) {
        var modalMessage = document.getElementById('modalMessage-' + agendaId);
        var nonaktifForm = document.getElementById('nonaktifForm-' + agendaId);

        if (modalMessage && nonaktifForm) {
            if (status === 0) {
                modalMessage.innerHTML = "Jadwal kegiatan ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }
            $('#hapusModal-' + agendaId).modal('show'); // Show the modal
        } else {
            console.error("Modal or form elements are missing for kegiatan ID:", agendaId);
        }
    }

    $(document).ready(function () {
        @if(session('success'))
            $('#BerhasilModal').modal('show');
        @endif
    });
    </script>
@endsection
