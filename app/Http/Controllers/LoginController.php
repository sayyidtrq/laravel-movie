<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function showLoginForm()
    {
        return view('login/login');
    }

    public function showSignUpForm()
    {
        return view('login/register');
    }

    public function signUp(Request $request){
        //username,email,password,level set to 1
        $request->validate([
            'uname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'updated_at' => now(),
        ]);

        $user = new User();
        $user->username = $request->uname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->updated_at = now();
        $user->level = 1;
        $user->photo = 'default.png';
        $user->created_at = now();
        $user->save();

        Auth::login($user); 

        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('uname', 'password');

        // Find the user by username
        $user = User::where('username', $credentials['uname'])->first();

        // Check if the user exists and if the password matches
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Log the user in
            Auth::login($user);
            return redirect()->route('movies');
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'uname' => 'The provided credentials do not match our records.',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about/about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
