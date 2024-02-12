@extends('admin.layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('img/logos/logo-2.png')}}" width="200px">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
                    {{ __('Login') }}
                </span>

                <div class="wrap-input100 validate-input">

                    <input id="email" type="text" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="اسم المستخدم">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">

                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمة السر">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                
                <center>
                    {{-- <div class="wrap-input100 validate-input" data-validate = "Password is required">

                        <label for="remember">
                            تذكرني
                        </label>
                        <input class="input100-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    </div> --}}

                    <button type="submit" class="btn btn-primary">
                        تسجيل الدخول
                    </button></br>
            
                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}
                </center>
            </form>
        </div>
    </div>
</div>
@endsection
