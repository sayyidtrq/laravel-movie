<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;

Route::get('/', [LoginController::class,'showLoginForm']);

Route::resource('/dashboard', LoginController::class);
Route::resource('/about', LoginController::class);

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);

Route::post('/logout', function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout'); 

Route::get('/register' , [LoginController::class, 'showSignUpForm'])->name('register');
Route::post('/register', [LoginController::class, 'signUp']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/movies', [MovieController::class, 'index'])->name('movies');
    Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

    Route::post('/movies/store', [MovieController::class, 'store'])->name('movies/store');

    Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::get('/movies/{id}/show', [MovieController::class, 'show'])->name('movies.show');

    Route::put('/movies/{movie}/update', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
});
