@extends('layouts.app')

@section('title', 'Thank you')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about-contacts.css') }}">
@endpush
@section('content')
    <div class="text-container">
        <div>
            <h1>Contacts</h1>
            <span>Email: happyToys@mail.com</span>
            <span>Phone: +900 - 456 - 5730402</span>
            <span>Address: 1441 Coral Ridge Ave, Coralville, IA 52241-2801</span>
        </div>
    </div>
@endsection
