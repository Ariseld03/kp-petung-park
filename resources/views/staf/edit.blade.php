@extends('layouts.mainAdmin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center text-success">Pembaruan Staff</h1>
        <form action="{{ route('staf.update', ['email' => $staff->email]) }}" method="post">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required readonly value="{{ $staff->email }}" autocomplete="email">
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ $staff->name }}" autocomplete="name">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="changePassword" name="changePassword">
                    <label class="form-check-label" for="changePassword">Ubah Password</label>
                </div>
                <div id="passwordFields" style="display: none;">
                    <div class="form-group">
                        <label for="oldPassword">Password Lama:</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Password Baru:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="newPasswordConfirm">Konfirmasi Password Baru:</label>
                        <input type="password" class="form-control" id="newPasswordConfirm" name="newPasswordConfirm" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required  value="{{ $staff->date_of_birth }}">
            </div>

            <div class="form-group">
                <label for="phone_number">Nomor Telepon:</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" required  value="{{ $staff->phone_number }}">
            </div>

            <div class="form-group">
                <label for="position">Posisi:</label>
                <select class="form-control" id="position" name="position">
                    <option value="admin" {{ $staff->position == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="staff" {{ $staff->position == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="user" {{ $staff->position == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="laki-laki" {{ $staff->gender == 'laki-laki' ? 'selected' : '' }} >Pria</option>
                    <option value="perempuan" {{ $staff->gender == 'perempuan' ? 'selected' : '' }}" >Wanita</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="0" {{ $staff->status == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                    <option value="1"{{ $staff->status == '1' ? 'selected' : '' }}>Aktif</option>
                </select>
            </div>

            <button class="btn btn-success" type="submit" onclick="location.href='{{ route('staf.update', ['email' => $staff->email]) }}'">Simpan Perubahan</button>
            <button class="btn btn-secondary" type="button" onclick="location.href='{{ route('staf.index') }}'">Kembali</button>
        </form>
    </div>
@endsection
@section('page-js')
    <script>
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(':checked')){
                    $('#passwordFields').show();
                } else {
                    $('#passwordFields').hide();
                }
            });
        });
    </script>
@endsection
