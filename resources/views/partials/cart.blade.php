@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@php
    $totalQty = session('cart.totalQty', 0);
@endphp

<div class="cart-container">
    <a href="{{ route('cart.order') }}" class="cart-link">
        <img src="{{ asset('storage/images/cart.png') }}" alt="cart" class="cart-icon"/>
        <span class="item-count">{{ $totalQty }}</span>
    </a>
</div>
