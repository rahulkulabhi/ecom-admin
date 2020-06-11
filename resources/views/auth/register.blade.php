@extends('layouts.auth')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
    </div>
    <form method="POST" class="user" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-user{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus id="exampleInputName" placeholder="Full Name">
            @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required id="exampleInputEmail" placeholder="Email Address">
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="exampleInputPassword" placeholder="Password">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="col-sm-6">
                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Register') }}
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
        <a class="small" href="{{ route('login') }}">{{ __('Login') }}</a>
    </div>
</div>
@endsection
