@extends('layouts.dashboard')

@section('content')

    <p>Welcome to the admin panel</p>

    @php
        $sections = config('sections');
    @endphp

    <div class="row g-3">
        @foreach ($sections as $section)
            <div class="col-12 col-md-6">
                <div class="card text-bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($section) }}</h5>
                        <p class="card-text">
                            <a href="{{ route('dashboard.' . $section . '.index') }}">Manage {{ $section }}</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
