@extends('layouts.app')

@section('title', 'Thank you')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/thank-you.css') }}">
@endpush
@section('content')
    <div class="thank-you-container">
        <div>
            <div>Thank you for your order!</div>
            <div class="link-to-main-page">
                <a href="{{ route('index') }}">Home</a>
            </div>
        </div>
    </div>
@endsection
