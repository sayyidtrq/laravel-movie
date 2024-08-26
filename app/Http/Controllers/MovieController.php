<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies/index', compact('movies'));
    }

    public function create()
    {   
        $movies = Movie::all();
        return view('movies/create', compact('movies'));
    }

    public function store(Request $request)
    {
        
        $movie = new Movie();
        
        try{
            $movie->Mov_title = $request->title;
            $movie->Mov_year = $request->year;
            $movie->Mov_time = $request->time;
            $movie->Mov_lang = $request->language;
            $movie->Mov_dt_rel = $request->release_date ;

            $file = $request->file('photo');
            if ($file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('photos', $fileName, 'public');
                $movie->Mov_photo = '/storage/' . $filePath; // Correctly store the file path in the database
            } else {
                throw new \Exception('Photo upload failed.');
            }


            $movie->Mov_rel_country = $request->country;
            $movie->updated_at = now();
            $movie->created_at = now();

            $movie->save();
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die();
        }

        return redirect()->route('movies');
    }


    public function show(Movie $id)
    {
        $movies = Movie::find($id -> Mov_id);
        // $movie = Movie::with('comments.user')->findOrFail($id);
        $comments = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.username')
            ->where('comments.mov_id', '=', $id->Mov_id)
            ->get();
        return view('movies/show',['movies' => $id],compact('movies', 'comments'));
    }

    public function edit(Movie $id)
    {
        $movies = Movie::find($id);
        return view('movies.edit',['movies' => $id], compact('movies'));
    }

    public function update(Request $request, $id)
    {
        // Find the movie by ID
        $movie = Movie::find($id);
    
        // Check if the movie exists
        if (!$movie) {
            return redirect()->route('movies')->with('error', 'Movie not found.');
        }
    
        // Update the movie details
        $movie->Mov_title = $request->title;
        $movie->Mov_year = $request->year;
        $movie->Mov_time = $request->time;
        $movie->Mov_lang = $request->language;
        $movie->Mov_dt_rel = $request->release_date;
        $movie->Mov_rel_country = $request->country;
        $movie->updated_at = now();
    
        // If a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            $destination = 'public/photos/' . basename($movie->Mov_photo);
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            // Upload the new photo
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('photos', $fileName, 'public');
            $movie->Mov_photo = '/storage/' . $filePath;
        }
    
        // Save the updated movie
        $movie->save();
    
        return redirect()->route('movies')->with('success', 'Movie updated successfully.');
    }
    
    

    public function destroy($id)
    {
        $movie = Movie::find($id);

        Storage::delete('public/' . $movie->photo);

        $movie->delete();

        return redirect()->route('movies')->with('success', 'Movie deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = Movie::query();

        if ($request->has('search') && $request->search) {
            $query->where('Mov_title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('year') && $request->year) {
            $query->where('Mov_year', $request->year);
        }

        if ($request->has('language') && $request->language) {
            $query->where('Mov_lang', 'like', '%' . $request->language . '%');
        }

        // Add more filters as needed

        $movies = $query->paginate(5);

        return view('movies/index', ['movies' => $movies]);
    }

}
