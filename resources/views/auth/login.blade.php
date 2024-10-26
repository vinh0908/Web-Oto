@extends('frontend.layout')

@section('login')
    <div class="container auth-container">
        <div class="row">
            <div class="col-md-12">
                <div class="auth-form">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}:</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div style="margin-bottom: 10px" class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Ghi nhớ đăng nhập') }}
                            </label>
                        </div>
                        <button type="submit" class="btn auth-button">Login</button>
                        @if (Route::has('password.request'))
                            <a style="color: rgba(203, 178, 190, 0.8);" class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Quên mật khẩu?') }}
                            </a>
                        @endif
                        <p class="mt-3">Don't have an account? <a class="auth-link"
                                href="{{ route('register') }}">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
