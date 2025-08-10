@extends('layouts.app')

@section('title', 'Home')

@section('content')
{{--    <h2><a href="{{route('products.index')}}">Categories</a></h2>--}}
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('categories.products', $category->id) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

