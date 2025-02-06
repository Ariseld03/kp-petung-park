@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kegiatanStaff.css') }}">
@endsection

@section('content')
@php
    $hasNonActive = $agenda->contains(fn($peragenda) => !$peragenda->articles()->exists());
@endphp
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Agenda</h1>
        <a href="{{ route('agenda.create') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah Agenda</a>
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
                    <th>User</th>
                    <th>Perbarui</th>
                    @if ($hasNonActive)
                        <th>Nonaktif</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($agenda as $peragenda)
                    <tr>
                        <td>{{ $peragenda->event_name }}</td>
                        <td>{{ $peragenda->event_start_date }}</td>
                        <td>{{ $peragenda->event_end_date }}</td>
                        <td>{{ $peragenda->event_location }}</td>
                        <td>{{ $peragenda->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>{{ $peragenda->description }}</td>
                        <td>{{ $peragenda->created_at }}</td>
                        <td>{{ $peragenda->updated_at }}</td>
                        <td>{{ $peragenda->user ? $peragenda->user->name : 'Tidak ada User yang Bertanggung Jawab' }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="location.href='{{ route('agenda.edit', $peragenda->id)}}'">Perbarui</button>
                        </td>
                        @if ($hasNonActive)
                            @if (!$peragenda->articles()->exists()) 
                        <td> 
                            <button type="button" 
                                        class="btn btn-danger"  
                                        onclick="handleNonaktif({{ $peragenda->id }}, {{ $peragenda->status }})">
                                    Nonaktif
                            </button>
                       
                            <div class="modal fade" id="hapusModal-{{ $peragenda->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $peragenda->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusModalLabel-{{ $peragenda->id }}">Konfirmasi Nonaktif</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="modalMessage-{{ $peragenda->id }}">Apakah Anda yakin ingin mengubah status data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('agenda.unactive', ['agenda' => $peragenda->id]) }}" method="POST" id="nonaktifForm-{{ $peragenda->id }}">
                                                @csrf
                                                @method('POST')
                                                <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                            @endif
                        @endif
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
                modalMessage.innerHTML = "Jadwal agenda ini sudah nonaktif.";
                nonaktifForm.querySelector("button[type='submit']").disabled = true; // Disable the submit button
            } else {
                modalMessage.innerHTML = "Apakah Anda yakin ingin mengubah status data ini?";
                nonaktifForm.querySelector("button[type='submit']").disabled = false; // Enable the submit button
            }
            $('#hapusModal-' + agendaId).modal('show'); // Show the modal
        } else {
            console.error("Modal or form elements are missing for agenda ID:", agendaId);
        }
    }

    $(document).ready(function () {
        @if(session('success'))
            $('#BerhasilModal').modal('show');
        @endif
    });
    </script>
@endsection
