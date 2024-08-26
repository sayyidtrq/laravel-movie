<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="register_body">
        <div class="container"> 
            @yield('content')
            <div class = "login_form"> 
                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <h2 class="text-4">Create Your Account</h2>
                    @if($errors->any())
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <label>User Name</label>
                    <input type="text" name="uname" placeholder="User Name"> <br>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email"> <br>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password"> <br>
                    <button type="submit">SUBMIT</button>
                </form>
            </div>
            <div class="container-2" >
                <div class = "logo-2"> 
                    <img src="{{ asset('assets/film3.png') }}">
                </div>
                <div class = "section_text"> 
                    <p class="p1">Hello ! </p>
                    <h2 class="tai">Please Register</h2 >
                    <p class="p1">Signup for amazing movies content </p>
                </div>
            </div>
        </div>
    </body>
</html>