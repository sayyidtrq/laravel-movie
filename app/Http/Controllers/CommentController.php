<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'mov_id' => $request->movie_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('movies.show', $request->movie_id)->with('success', 'Comment added successfully.');
    }
    public function show($id)
    {
        $movie = Movie::with('comments.user')->findOrFail($id);
        $movie = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'movies.Mov_title', 'users.username')
            ->where('comments.mov_id', '=', $id)
            ->get();
        return view('movies.show', compact('movie'));
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    }
}
