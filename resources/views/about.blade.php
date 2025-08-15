@extends('layouts.app')

@section('title', 'About Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about-contacts.css') }}">
@endpush

@section('content')
    <div class="text-container">
        <div>
            <h1>About Us</h1>
            <span>
                Welcome to HappyToys, your go-to destination for fun, quality, and imagination! <br><br>
                At HappyToys, we believe that every child deserves to smile, play, and dream big. Since our beginning, our mission has been to bring joy to families by offering a wide range of carefully selected toys for children of all ages. From educational games and soft plush animals to exciting outdoor adventures and creative crafts — we have something special for every little one. <br><br>
                We are passionate about providing safe, affordable, and high-quality toys that inspire creativity, learning, and happiness. Our friendly team is always here to help you choose the perfect gift for birthdays, holidays, or just because! <br><br>
                Thank you for being a part of the HappyToys family — where every toy tells a story.
            </span>
        </div>
    </div>
@endsection
