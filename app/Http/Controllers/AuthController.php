<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\UserController;

class AuthController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    // Register a new user
    public function signup(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create the user via UserController
    $userController = new UserController();
    $userController->store($request); // User created successfully

    // Redirect to the login page with a success message
    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
}

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Get the authenticated user

            // Check the user's role and redirect accordingly
            if ($user->role_id === 1) { // Assuming role_id 1 is for admin
                return redirect()->route('admin.home'); // Redirect to admin dashboard
            } else {
                return redirect()->route('homepage'); // Redirect to user homepage
            }
        }

        // Authentication failed, redirect back with input and error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
