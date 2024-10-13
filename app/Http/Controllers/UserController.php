<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role; // Ensure you import the Role model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display all users for admin
    public function index()
    {  
        $users = User::all();
        return view('user.admin', compact('users'));
    }

    // Show form for creating a new user
    public function create()
    {
        $roles = Role::all(); // Fetch all roles for the dropdown
        return view('user.create', compact('roles'));
    }

    // Store a newly created user
    public function store(Request $request)
    {
        $this->validateUser($request);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        // Return the newly created user object
        return $user; // This will be used in AuthController
    }

    // Show form for editing a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Fetch roles for the dropdown
        return view('user.edit', compact('user', 'roles'));
    }

    // Update an existing user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $this->validateUser($request, $user->id); // Pass current user ID for unique email validation

        // Only update the fields that are being modified
        $user->update($request->only('name', 'email', 'role_id'));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    // Validate user input
    protected function validateUser(Request $request, $userId = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'password' => 'required|string|min:6|confirmed', // Require confirmation for password
            'role_id' => 'nullable|exists:roles,id',
        ];

        $request->validate($rules);
    }
}
