@extends('auth.layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('home') }}"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <input id="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror"
                        name="user_email" value="{{ old('user_email') }}" required autocomplete="user_email" autofocus
                        placeholder="Email Address">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('user_email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Send Password Reset Link') }}
                </button>
            </form>
            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Have you remembered it?</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">New Employee Registration</a>
            </p>
        </div>
    </div>
</div>
@endsection
