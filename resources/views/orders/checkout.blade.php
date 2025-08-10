@extends('layouts.app')

@section('title', 'Cart')

@section('content')
    <div> Cart with Products
        @php
            $cart = session('cart');
            $totalPrice = session('cartTotal.totalPrice');
            $totalQty = session('cartTotal.totalQty');
        @endphp
        @if (isset($cart))
            @foreach ($cart as $item)
                <div>Product: {{$item['name']}}</div>
                <div>Price: {{$item['price']}}</div>
                <div>Quantity: {{$item['quantity']}}</div>
            @endforeach
            <div>Total price: {{$totalPrice}}</div>
            <div>Total quantity: {{$totalQty}}</div>
        @endif
        <form action="{{route('order.store')}}" method="POST">
            {{csrf_field()}}
            {{method_field('POST')}}
            <label for="phone">Phone number</label>
            <input type="text" id="phone" name="customerPhone"/>
            <label for="name">Name</label>
            <input type="text" id="name" name="customerName"/>
            <label for="info">Delivery info</label>
            <input type="text" id="info" name="deliveryInfo"/>
            <input type="submit" value="Make order">
        </form>

    </div>
@endsection
