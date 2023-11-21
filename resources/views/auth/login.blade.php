@extends('layouts.auth')

@section('content')
<section class="login-content">
    <div class="logo">
        <h1>{{ config('app.name', 'PKAds') }}</h1>
    </div>
    <div class="login-box">
        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <h3 class="login-head">
                <i class="fa fa-lg fa-fw fa-user"></i>SIGN IN
            </h3>
            <div class="form-group">
                <label class="control-label">{{ __('E-Mail') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus>
                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">{{ __('Password') }}</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                @error('password')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : 'checked' }}>
                            <span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Login') }}
                </button>
            </div>
        </form>
        <form action="{{ route('password.email') }}" method="POST" class="forget-form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">{{ __('E-Mail') }}</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus>

                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group btn-container">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-unlock fa-lg fa-fw"></i>{{ __('Send Password Reset Link') }}
                </button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0">
                    <a href="#" data-toggle="flip">
                        <i class="fa fa-angle-left fa-fw"></i> Back to Login
                    </a>
                </p>
            </div>
        </form>
    </div>
</section>
@endsection
