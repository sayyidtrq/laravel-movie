<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
    <div class="content-container">
        <div class="nav"> 
            <p class=text-1> 
                <span class="span1">Movie</span> 
                <span class="span2">Gram</span>
            </p>
            <ul class = "nav-links">
                <li><a href="{{ route('movies') }}">Dashboard</a></li>
                <li><a href="{{ route('movies.create') }}">Create Movies</a></li>
                <li><a href="{{ route('movies.create') }}">Edit Profile</a></li>
                <form class="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="logout-button" type="submit">Logout</button>
                </form>
            </ul>
        </div>    
        @if ($message = Session::get('success'))
            <p>{{ $message }}</p>
        @endif
        <div class="movies_container"> 
            <h2 class="title">Movies</h2>
            <div class="head-container">
                <h2 class="h2">Our Movie</h2>
                <form class="search-bar" type="get" action="{{ route('movies.search') }}">
                    <input type="text" name="search" placeholder="Search Movies">
                    <input type="text" name="year" placeholder="Search by Year">
                    <input type="text" name="language" placeholder="Search by Language">
                    <button class="search-btn" type="submit">Search</button>
                </form>
            </div>
            <div class="grid_view">
                @foreach ($movies as $movie)  
                    <div class="items">
                        <img src="{{ asset($movie->Mov_photo) }}" class="img" width="100px" height="150px"/>
                        <p class="p">{{ ucfirst($movie->Mov_title) }}</p>
                        <div class="btn-container"> 
                            <a href="{{ route('movies.show', $movie->Mov_id) }}" class="btn">Info</a>
                            <a href="{{ route('movies.edit', $movie->Mov_id) }}" class="btn">Edit</a>
                            <form action="{{ route('movies.destroy', $movie->Mov_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
    </html>
    
    {{-- <table class="table">
        <tr>
            <th>Title</th>
            <th>Year</th>
            <th>Time</th>
            <th>Language</th>
            <th>Release Date</th>
            <th>Country</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->Mov_title }}</td>
            <td>{{ $movie->Mov_year }}</td>
            <td>{{ $movie->Mov_time }}</td>
            <td>{{ $movie->Mov_lang }}</td>
            <td>{{ $movie->Mov_dt_rel}}</td>
            <td>{{ $movie->Mov_rel_country}}</td>
            <td>
                <img src="{{ asset($movie->Mov_photo) }}" width= '50' height='50' class="img img-responsive" />
            </td>
            <td>
                <a href="{{ route('movies.show', $movie->Mov_id) }}">Show</a>
                <a href="{{ route('movies.edit', $movie->Mov_id) }}">Edit</a>
                <form action="{{ route('movies.destroy', $movie->Mov_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> --}}