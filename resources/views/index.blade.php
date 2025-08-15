@extends('layouts.app')

@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endpush

@section('cart')
    @include('partials.cart')
@endsection

@section('content')
    <div class="category-grid">
        @foreach ($categories as $category)
            <div class="category-item">
                <a href="{{ route('categories.products', $category->id) }}">
                    <div class="category-content">
                        <img src="{{asset( 'storage/' . $category->path )}}" alt="" class="categories-img"/>
                        <div class="category-name">{{ $category->name }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
