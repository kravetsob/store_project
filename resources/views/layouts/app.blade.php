<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @stack('styles')
        <title>MyStore</title>
    </head>
    <body>
        <header class="site-header">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('storage/images/logo.jpg') }}" alt="logo" class="logo-img">
                </a>
            </div>

            <nav class="main-nav">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
            </nav>

            <div class="cart">
                @yield('cart')
            </div>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
                <div>&copy; 2025 Olha Kravets</div>
        </footer>
    </body>
</html>
