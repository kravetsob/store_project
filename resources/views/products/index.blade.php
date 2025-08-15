@extends('layouts.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endpush

@section('cart')
    @include('partials.cart')
@endsection

@section('content')
    <div class="product-list">
        <ul>
            @if($products->isEmpty())
                <li><p>No products available at the moment. <a href="{{ route('index') }}">Back to Home</a></p></li>
            @else
                @foreach ($products as $product)
                    <li class="product-item">
                        <a href="{{ route('product.show', $product->id) }}">
                            <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->name }}"/>
                            <span>{{ $product->name }}</span>
                        </a>
                        <div class="buy-product">
                            <div class="buy-button"><a href="{{ route('product.show', $product->id) }}">Buy</a></div>
                            <div>Price: ${{ $product->price }}</div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection
