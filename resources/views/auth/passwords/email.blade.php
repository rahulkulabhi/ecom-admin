@extends('layouts.auth')

@section('content')
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Reset Password') }}</h1>
        <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" class="user" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input type="email" class="form-control form-control-user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>
@endsection
