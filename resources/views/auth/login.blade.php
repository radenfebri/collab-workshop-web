@extends('auth.layouts.master')

@section('title', "Login | Tuku Buku")

@section('content')

<div class="row">
    <div class="col-md-12 mb-3">
        
        <h2>Sign In</h2>
        <p>Masukkan username & password untuk melakukan login.</p>
        
    </div>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="username" class="form-control @error('username') is-invalid @enderror"  name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        
        <div class="col-12">
            <div class="mb-4">
                <button type="submit" class="btn btn-primary w-100">SIGN IN</button>
            </div>
        </div>
        
    </form>
    
    {{-- <div class="col-12 mb-4">
        <div class="">
            <div class="seperator">
                <hr>
                <div class="seperator-text"> <span>Or continue with</span></div>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
        <div class="mb-4">
            <a href="#">
                <button class="btn  btn-social-login w-100 ">
                    <img src="{{ asset('template-login') }}/src/assets/img/google-gmail.svg" alt="" class="img-fluid">
                    <span class="btn-text-inner">Google</span>
                </button>
            </a>
        </div>
    </div> --}}
    
    <div class="col-12">
        <div class="text-center">
            <p class="mb-0">Apakah anda belum memiliki akun? <a href="{{ route('register') }}" class="text-warning">Sign Up</a></p>
        </div>
    </div>
    
    <div class="col-12">
        <div class="text-center">
            @if (Route::has('password.request'))
            <a class="mb-0 text-warning" href="{{ route('password.request') }}">
                Lupa password?
            </a>
            @endif
        </div>
    </div>
    
    
</div>

@endsection