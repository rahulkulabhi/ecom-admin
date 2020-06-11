@extends('layouts.auth')

@section('content')
<div class="p-5">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
    @endif
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Verify Your Email Address') }}</h1>
        <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        <p class="mb-4">{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.</p>
    </div>
</div>
@endsection
