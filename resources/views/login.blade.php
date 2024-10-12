@extends('layouts.loginRegis') <!-- Menggunakan layout yang baru dibuat -->

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('container-main')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Login Form Section -->
            <div class="col-md-12 d-flex align-items-center justify-content-center"> <!-- Mengubah kolom menjadi 12 untuk full width -->
                <div class="login-container">
                    <div class="login-title">Masuk</div>

                    <form class="inputLogin" action="{{ url('login') }}" method="POST"> <!-- Sesuaikan action dan method jika perlu -->
                        @csrf <!-- Menyertakan token CSRF -->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control p-3" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control p-3" placeholder="Masukkan Kata Sandi" required>
                        </div>
                        <button type="submit" class="btn btn-block">Masuk</button> <!-- Menghilangkan onclick untuk redirect -->
                    </form>

                    <!-- Signup Section -->
                    <div class="signup-container d-flex align-items-center mt-4">
                        <p class="mb-0">Belum memiliki akun?</p>
                        <button type="button" class="btn p-0 ml-2" onclick="window.location.href='{{ url('register') }}'">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
