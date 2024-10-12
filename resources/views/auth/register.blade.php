@extends('layouts.app')
@extends('layouts.loginRegis')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/register.css') }}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex align-items-center justify-content-center">
            <div class="login-container">
                <div class="login-title">Daftar</div>
                    <form method="POST" class="inputRegister" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Pengguna" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Kata Sandi" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="signup-container d-flex align-items-center mt-4">
                        <p class="mb-0" style="font-size: 18px;">Sudah memiliki akun?</p>
                        <a class="btn btn-link p-0 ml-2 mb-3" style="color: #295A3F; font-size: 18px;" onclick="window.location.href='{{ route('login') }}'">{{ __('Login') }}</a>
                    </div>
                        <div class="row mb-2">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
