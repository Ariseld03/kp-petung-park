@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/kolaseStaff.css') }}">
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Daftar kolase</h1>
        <a href="{{ route('menu.menupaket.add') }}" class="btn btn-warning mb-3" style="font-weight: bold;">Tambah kolase</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Paket</th>
                    <th>Status</th>
                    <th>Daftar Menu</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $displayedPackages = []; // Track displayed package IDs
                @endphp

                @foreach($packagemenus as $package)
                    @if (!in_array($package->package_id, $displayedPackages))
                        @php
                            $displayedPackages[] = $package->package_id; // Mark package_id as displayed
                        @endphp
                        <tr>
                            <td>{{ $package->package ? $package->package->name : 'Package not found' }}</td>

                            <td>{{ $package->status == 1 ? 'Aktif' : 'Nonaktif' }}</td>

                            <td>
                                @if ($package->package && $package->package->menus->isNotEmpty())
                                    @foreach($package->package->menus as $menu)
                                        {{ $menu->name }}<br>
                                    @endforeach
                                @else
                                    Tidak ada menu.
                                @endif
                            </td>

                            <td>{{ $package->created_at->format('d-m-Y') }}</td>

                            <td>{{ $package->updated_at->format('d-m-Y') }}</td>

                            {{-- Update Button --}}
                            <td>
                                <form action="{{ route('menu.menupaket.edit', ['packagemenu' => $package->package->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                </form>
                            </td>

                            {{-- Deactivate Button --}}
                            <td>
                                <button type="button" 
                                        class="btn btn-danger" 
                                        data-toggle="modal" 
                                        data-target="#hapusModal-{{ $package->id }}">
                                    Nonaktif
                                </button>
                            </td>
                        </tr>

                        {{-- Modal for Deactivation --}}
                        <div class="modal fade" id="hapusModal-{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-{{ $package->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel-{{ $package->id }}">Konfirmasi Nonaktif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin mengubah status data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form action="{{ route('wisata.gallery.delete', ['packagemenu' => $package->package->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </tbody>

        </table>
    </div>
@endsection

