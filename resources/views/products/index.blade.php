@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div>
        <ul>
            @foreach ($products as $product)
            <li>
                <a href="{{ route('product.show', $product->id) }}">
                    {{ $product->name }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
@endsection
