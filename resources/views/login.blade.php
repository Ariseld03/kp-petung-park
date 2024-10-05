@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('container-main')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Login Form Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="login-container">
                    <div class="login-title">Masuk</div>

                    <form class="inputLogin">
                        <div class="form-group">
                            <input type="email" class="form-control p-3" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control p-3" placeholder="Masukkan Kata Sandi" required>
                        </div>
                        <button type="submit" class="btn btn-block" onclick="window.location.href='{{ url('beranda') }}'">Masuk</button>
                    </form>

                    <!-- Signup Section -->
                    <div class="signup-container d-flex align-items-center mt-4">
                        <p class="mb-0">Belum memiliki akun?</p>
                        <button type="button" class="btn p-0 ml-2" onclick="window.location.href='{{ url('register') }}'">Daftar</button>
                    </div>
                </div>
            </div>

            <!-- Image Section -->
            <div class="col-md-6 p-0">
                <div class="image-container h-100">
                    <img src="/images/login/bambu.jpg" alt="Gambar Bambu" class="w-100 h-100">
                </div>
            </div>
        </div>
    </div>
@endsection
