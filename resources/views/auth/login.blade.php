@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('content')
    <div class="login-wrapper">
        <div class="login-card">
            <h2>{{ __('Login') }}</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="login" class="form-label">{{ __('Login') }}</label>
                    <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                           name="login" value="{{ old('login') }}" required autofocus>

                    @error('login')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
