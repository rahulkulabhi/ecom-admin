@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Profile</h1>
<!-- 404 Error Text -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile Details:</div>

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
        </div>
    </div>

@endsection