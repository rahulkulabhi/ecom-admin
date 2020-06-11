@extends('layouts.admin')

@section('content')
<!-- 404 Error Text -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
    </div>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('edit-profile') }}">
        	@csrf

        	<div class="form-group">
        		<label for="userFullName">Full Name</label>
        		<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="userFullName" placeholder="Enter Full Name" name="name" value="{{ old('name') ?? $user->name }}">
        		@if ($errors->has('name'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('name') }}</strong>
	            </span>
	            @endif
        	</div>
        	<div class="form-group">
        		<label for="userEmail">Email</label>
        		<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="userEmail" placeholder="Enter Email" name="email" value="{{ $user->email }}">
        		@if ($errors->has('email'))
	            <span class="invalid-feedback" role="alert">
	                <strong>{{ $errors->first('email') }}</strong>
	            </span>
	            @endif
        	</div>

        	<div class="form-group row">
	            <div class="col-sm-6 mb-3 mb-sm-0">
	            	<label for="userPassword">Password</label>
	                <input type="password" class="form-control form-control-user{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="userPassword" placeholder="Password">
	                @if ($errors->has('password'))
	                <span class="invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	                @endif
	            </div>
	            <div class="col-sm-6">
	            	<label for="password-confirm">Confirm Password</label>
	                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password">
	            </div>
	        </div>

        	<button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection