<!DOCTYPE html>
<html lang="en">   
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="outer-container">
            <div class="photo-container">
                <img src="{{ asset($movies->Mov_photo) }}" alt="Movie Photo" width="500px" height="750px">
            </div>
            <div class="info-container">
                <p class="movie-title">{{ ucfirst($movies->Mov_title) }}</p>
                <table class="info-table">
                    <tr>
                        <th>Year</th>
                        <td>{{ $movies->Mov_year }}</td>
                    </tr>
                    <tr>
                        <th>Duration</th>
                        <td>{{ $movies->Mov_time }} minutes</td>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <td>{{ $movies->Mov_lang }}</td>
                    </tr>
                    <tr>
                        <th>Release Date</th>
                        <td>{{ $movies->Mov_dt_rel }}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{ $movies->Mov_rel_country }}</td>
                    </tr>
                </table>
                <div class="comments-container">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="movie_id" value="{{ $movies->Mov_id }}">
                            <div class="comment-form">
                                <textarea class="text-area" name="content" placeholder="Write your comment here" required></textarea>
                                <button class="comment-button" type="submit">Comment</button>
                            </div>
                        </form>
                    <h2>Comments</h2>
                    
                    @foreach ($comments as $comment)
                    <div class="comment">
                        <p class="comments-place">{{ $comment->username}} : {{ $comment->content }}</p>
                        <form class="delete-btn" action="{{ route('comments.destroy', $comment->comment_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn-real" type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                    @endforeach
                    <a href="{{ route('movies') }}">Back to list</a>
                </div>
            </div>
        </div>
    </body>
</html>

{{-- <p>Title: {{ $movies->Mov_title }}</p>
<p>Year: {{ $movies->Mov_year }}</p>
<p>Time: {{ $movies->Mov_time }}</p>
<p>Language: {{ $movies->Mov_lang }}</p>
<p>Release Date: {{ $movies->Mov_dt_rel }}</p>
<p>Country: {{ $movies->Mov_rel_country }}</p>
<a href="{{ route('movies') }}">Back to list</a> --}}