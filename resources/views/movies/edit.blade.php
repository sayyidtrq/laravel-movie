<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Edit Movie</h1>
    <form action="{{ route('movies.update', $movies->Mov_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Title:</label>
        <input type="text" name="title" value="{{ $movies->Mov_title }}" required>
        <label>Year:</label>
        <input type="number" name="year" value="{{ $movies->Mov_year }}" required>
        <label>Time:</label>
        <input type="text" name="time" value="{{ $movies->Mov_time }}" required>
        <label>Language:</label>
        <input type="text" name="language" value="{{ $movies->Mov_lang }}" required>
        <label>Release Date:</label>
        <input type="date" name="release_date" value="{{ $movies->Mov_dt_rel }}" required>
        <label>Country:</label>
        <input type="text" name="country" value="{{ $movies->Mov_rel_country }}" required>
        <label>Photo:</label>
        <input type="file" name="photo">
        <button type="submit">Update</button>
        <button type="button" onclick="window.location='{{ route('movies') }}'">Cancel</button>
    </form>
</body>
</html>