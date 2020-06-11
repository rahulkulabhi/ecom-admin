@extends('layouts.auth')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
    </div>
    <form method="POST" class="user" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword" placeholder="Enter Password" name="password" required>
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>
        <hr>
        <button type="button" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Register with Google
        </button>
        <button type="button" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
        </button>
    </form>
    <hr>
    <div class="text-center">
        @if (Route::has('password.request'))
        <a class="small" href="{{ route('password.request') }}">
            {{ __('Forgot Password?') }}
        </a>
        @endif
    </div>
    <div class="text-center">
        <a class="small" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
</div>
@endsection
