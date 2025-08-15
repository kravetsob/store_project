@extends('layouts.app')

@section('title', $product->name)

@section('cart')
    @include('partials.cart')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endpush

@section('content')
    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-details">
            <h1>{{ $product->name }}</h1>
            <p class="description">{{ $product->description }}</p>
            <p class="price">Price: ${{ $product->price }}</p>

            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart-form">
                @csrf
                <label for="qty"></label>
                <div class="quantity-row">
                    <div class="quantity-control">
{{--                        <button type="button" class="decrement">-</button>--}}
                        <input type="number" id="qty" name="qty" value="{{ old('qty', 1) }}" min="1" />
{{--                        <button type="button" class="increment">+</button>--}}
                    </div>
                    <input type="submit" value="Add to cart" class="add-button">
                </div>
            </form>

            <div class="order-link">
                <a href="{{ route('cart.order') }}">Place order</a>
            </div>
        </div>
    </div>
@endsection
