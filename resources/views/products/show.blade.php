@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div>
        <h1>{{ $product->name }}</h1>
        <p>Description:{{ $product->description }}</p>
        <p>Cost: {{ $product->price }}</p>
        <div>
            <form action="{{ route('cart.add',$product->id) }}" method="POST">
                {{csrf_field()}}
                {{method_field('POST')}}
                <label for="qty">Qty</label>
                <input type="number" id="qty" step="1" name="qty" min="1" value="{{ old('qty') }}"/>
                <input type="submit" value="Add to cart">
            </form>
        </div>
        <div>
            <a href="{{ route('cart.order') }}">Order</a>
        </div>
@endsection
