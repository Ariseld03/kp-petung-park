@php
    $hasNonActive = $categories->contains(fn($category) => !$category->menus()->exists());
@endphp
@extends('layouts.mainAdmin')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')

    <div class="container mt-5">
        <h1 class="text-center" style="color: #557C56;">Kategori</h1>

        <!-- Tabel Kategori -->
        <a class="btn btn-warning mb-3" style="font-weight: bold;" onclick="location.href='{{ route('kategori.create') }}'">Tambah Kategori</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diubah</th>
                    <th>Perbarui</th>
                    @if ($hasNonActive)
                    <th>Nonaktif</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                        <td>{{ $category->updated_at->format('d-m-Y') }}</td>
                        <td>
                            <button class="btn btn-primary" onclick="location.href='{{ route('kategori.edit', $category->id) }}'">Perbarui</button>
                        </td>
                        @if ($hasNonActive)
                            @if (!$category->menus()->exists()) 
                            <td>    
                                <button type="button" class="btn btn-danger" onclick="handleNonaktif({{ $category->id }}, {{ (int)$category->status }}, 'category')">
                                    Nonaktif
                                </button>

                                <div class="modal fade" id="hapusModal-category-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel-category-{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel-category-{{ $category->id }}">Konfirmasi Nonaktif</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="modalMessage-category-{{ $category->id }}">
                                                Apakah Anda yakin ingin mengubah status kategori ini?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="{{ route('kategori.unactive', $category->id) }}" method="POST" id="nonaktifForm-category-{{ $category->id }}">
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
<script src="{{ asset('js/modalHandler.js') }}"></script>
@if(session('success') === true)
    <script>
        $(document).ready(function() {
            $('#BerhasilModal').modal('show');
            $('#BerhasilModal .modal-body').html('Data berhasil dinonaktifkan');
        });
    </script>
@endif
@endsection

