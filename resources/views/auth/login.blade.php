@extends('layouts.loginRegis')
@extends('layouts.app')

@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
@endsection

@section('container-main')
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Login Form Section -->
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <div class="login-container">
                    <div class="login-title">Masuk</div>

                    <form class="inputLogin" method="POST" action="{{ route('login') }}"> 
                        @csrf 
                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Alamat Email') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        @error('email')
                            <div class="col-md-8 offset-md-4 mb-1 p-0">
                                <span class="text-danger" style="font-size: 14px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Kata Sandi') }}</label>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Kata Sandi" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        @error('password')
                            <div class="col-md-8 offset-md-4 mb-1 p-0">
                                <span class="text-danger" style="font-size: 14px;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>
                        @enderror

                        <!-- "Remember Me" dan "Forgot Your Password?" -->
                        <div class="form-group col-md-6 offset-md-3 d-flex align-items-center">
                            <input class="form-check-input custom-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label ms-2 mb-0 d-flex align-items-center" style="font-size: 14px;" for="remember">
                                {{ __('Ingat Saya') }}
                            </label>
                            @if (Route::has('password.request'))
                                <a class="forgot-password-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa kata sandi?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Button Login -->
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-block">
                                {{ __('Masuk') }}
                            </button>
                        </div>

                    <!-- Signup Section -->
                    <div class="signup-container">
                        <p class="text-regis">Belum memiliki akun ?</p>
                        <button type="button" class="btn p-0 ml-2" onclick="window.location.href='{{ route('register') }}'">{{ __('Daftar') }}</button>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
