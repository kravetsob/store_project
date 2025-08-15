<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-size: .875rem;
        }
    </style>
</head>
<body>

<header class="navbar navbar-dark bg-dark sticky-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard.home') }}">My Admin</a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link nav-link px-3">Logout</button>
            </form>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">

        <!-- Main Content -->
        <main class="col-12 px-md-4 py-4">
            @yield('content')
        </main>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
