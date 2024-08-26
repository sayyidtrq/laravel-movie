
    <!DOCTYPE html>
    <html lang="en">    
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard</title>
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        </head>
        <body class="body_login">
            <div class="container">
                @yield('content')
                <div class = "login_form"> 
                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        @if(session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                        @endif
                        <p class=text-1> 
                            <span class="span1">Movie</span> 
                            <span class="span2">Gram</span>
                        </p>
                        <h2 class="text-2">Artificial Intelligence Driving
                            Results For The Movie Industry</h2>
                        <h2 class="text-3">Welcome, please login to your account</h2>
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
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password"> 

                        <div class="links">
                            <a href="">Remember Me</a>
                            <a href="">Forgot Password</a>
                        </div>
                        <div class="btn-container"> 
                            <button type="submit">LOGIN</button>
                            <a class = "reg_button" href ="{{route ("register")}}">REGISTER</a>
                        </div>
                        
                    </form>
                </div>
                <div class="container-2" >
                    <div class = "logo"> 
                        <img src="{{ asset('assets/film2.png') }}">
                    </div>
                </div>
            </div>
        </body>
    </html>