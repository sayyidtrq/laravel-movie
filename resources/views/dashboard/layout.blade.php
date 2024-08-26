<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="nav"> 
            <ul class = "nav-links">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('movies') }}">Movies</a></li>
                <li><a>About</a></li>
            </ul>
        </nav>
        <h1>Login Page</h1>
        <div class="container">
            @yield('content')

        </div>
    </body>
</html>