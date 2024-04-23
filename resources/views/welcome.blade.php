<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        /* Your styles here */
        body {
            font-family: 'Figtree', sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background-color: #070707;
            border-radius: 0.5rem;
            padding: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 150ms ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card a {
            display: block;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
            transition: all 150ms ease-in-out;
        }
        .card a:hover {
            color: #6b7280;
        }
    </style>
</head>
<body class="antialiased bg-gray-100">
    <center>Imanuels</center>
    <div class="container">
        <div class="card">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</body>
</html>
