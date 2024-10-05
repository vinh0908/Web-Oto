@extends('frontend.layout')

@section('login')

<div class="container auth-container" id="register-form">
    <div class="row">
        <div class="col-md-12">
            <div class="auth-form">
                <h3>Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}:</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('Email Address') }}:</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}:</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <button type="submit" class="btn auth-button">Register</button>
                    <p class="mt-3">Already have an account? <a href="{{ route('login') }}" class="auth-link" onclick="showLoginForm()">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
