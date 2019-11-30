@extends('auth.layouts.app')

@section('content')
<div class="card-body register-card-body">
    <p class="login-box-msg">Register a new membership</p>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input-group mb-3">
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                    name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus
                    placeholder="Username">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                @error('user_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="user_email" type="email" class="form-control @error('user_email') is-invalid @enderror"
                    name="user_email" value="{{ old('user_email') }}" required autocomplete="user_email"
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
            <div class="input-group mb-3">
                <input id="user_pass" type="password" class="form-control @error('user_pass') is-invalid @enderror"
                    name="user_pass" required autocomplete="new-password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('user_pass')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input id="user_pass-confirm" type="password" class="form-control" name="user_pass_confirmation"
                    required autocomplete="new-user_pass" placeholder="Confirm Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="terms" name="terms" value="agree" {{ old('terms') ? 'checked' : '' }} required>
                        <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
</div>
@endsection
