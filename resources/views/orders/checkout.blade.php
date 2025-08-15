@extends('layouts.app')

@section('title', 'Cart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endpush

@section('content')
    <div class="cart-container">
        <h2>Cart</h2>
        @php
            $cart = session('cart', [
                'items' => [],
                'totalQty' => 0,
                'amount' => 0,
            ]);

            $totalPrice = $cart['amount'];
            $totalQty = $cart['totalQty'];
        @endphp
        @include('common.errors')
        <div class="cart-flex">
            <div class="order-details">
                <form action="{{route('order.store')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <label for="phone">Phone number</label>
                    <input type="text" id="phone" name="customerPhone" value="{{ old('customerPhone') }}"/>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="customerName" value="{{ old('customerName') }}"/>
                    <label for="info">Delivery info</label>
                    <input type="text" id="info" name="deliveryInfo" value="{{ old('deliveryInfo') }}"/>
                    <input type="submit" value="Make order">
                </form>
            </div>

            <div class="cart-items">
                @if (!empty($cart['items']))
                    @foreach ($cart['items'] as $item)
                        <div class="cart-item">
                            <div class="cart-item-info">
                                <div>Product: {{ $item['name'] }}</div>
                                <div>Price: ${{ $item['price'] }}</div>
                                <div>Quantity: {{ $item['quantity'] }}</div>
                            </div>
                            <div class="cart-item-img">
                                <img src="{{ asset('storage/' . $item['path']) }}" alt="{{ $item['name'] }}">
                            </div>
                        </div>
                    @endforeach

                    <div class="cart-total">Total price: ${{ $totalPrice }}</div>
                    <div class="cart-total">Total quantity: {{ $totalQty }}</div>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
