@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/paketAdd.css') }}">
@endsection

@section ('content')
    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Menu</h1>

        <!-- Tabel Paket -->
        <h2 class="judul-paket" style="color: #557C56;">Paket</h2>
        <a class="btn btn-warning mb-3" style="font-weight: bold;" onclick="location.href='{{ route('menu.paket.add') }}'">Tambah Paket</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Jumlah Like</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>Rp{{ number_format($package->price, 0, ',', '.') }}</td>
                        <td>{{ $package->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>{{ $package->number_love }}</td>
                        <td>{{ $package->created_at->format('d-m-Y') }}</td>
                        <td>{{ $package->updated_at->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="location.href='{{ route('menu.paket.edit', $package->id) }}'">Perbarui</button>
                        </td>
                        <td>
                            <form action="{{ route('menu.paket.delete', $package->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabel Hidangan -->
        <h2 class="hidangan-title" style="color: #557C56;">Hidangan</h2>
        <button id="addRowHidangan" class="btn btn-warning mb-3" style="font-weight: bold;" onclick="location.href='{{ route('menu.hidangan.add') }}'">Tambah Hidangan</button>
        <div class="hidangan-menu">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Rekomendasi</th>
                        <th>Jumlah Like</th>
                        <th>Tanggal Dibuat</th>
                        <th>Tanggal Diubah</th>
                        <th>Perbarui</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $dish)
                        <tr>
                            <td>{{ $dish->name }}</td>
                            <td>Rp{{ number_format($dish->price, 0, ',', '.') }}</td>
                            <td>{{ $dish->status ? 'Aktif' : 'Nonaktif' }}</td>
                            <td>{{ $dish->is_recommended ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $dish->number_love }}</td>
                            <td>{{ $dish->created_at->format('d-m-Y') }}</td>
                            <td>{{ $dish->updated_at->format('d-m-Y') }}</td>
                            <td>
                                <button class="btn btn-primary" onclick="location.href='{{ route('menu.hidangan.edit', $dish->id) }}'">Perbarui</button>
                            </td>
                            <td>
                                <form action="{{ route('menu.hidangan.delete', $dish->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hidangan ini?');">
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
    </div>
@endsection

