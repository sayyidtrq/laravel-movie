<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="layout_container">
        <div class="desc_container">   
            <div class = "logo"> 
                <img src="{{ asset('assets/film2.png') }}">
            </div>
        </div>
        <div class="create_container">
            <form class="create_form" action="{{ route('movies/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="new_movie">Add New Movie</h1>
                
                <input type="text" name="title" placeholder="Enter Movie Title" required>
                <input type="number" name="year" placeholder="Enter Release Year">
                <input type="text" name="time" placeholder="Enter Duration" required>
                <input type="text" name="language" placeholder="Enter Movie Language" required>
                
                <!-- Image upload input -->
                <input class="form-control" name="photo" type="file" id="photo" onchange="previewImage(event)">
                
                <!-- Image preview -->
                <div id="imagePreview" style="margin-top: 10px;">
                    <img id="preview" src="#" alt="Image Preview" style="display:none; max-width: 100px;">
                </div>
                
                <input type="date" name="release_date" required>
                <input type="text" name="country" placeholder="Enter Country of Origin" required>
                
                <button type="submit">Submit</button>
                <button type="button" onclick="window.location='{{ route('movies') }}'">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('preview');
                preview.src = e.target.result;
                preview.style.display = 'block';

            };
            reader.readAsDataURL(file);
        }
    </script>
</body>
</html>
