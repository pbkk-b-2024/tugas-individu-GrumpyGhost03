<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // List all roles
    public function index()
    {
        $roles = Role::all(); // Fetch all roles
        return response()->json($roles); // Return roles as JSON
    }

    // Show a specific role
    public function show($id)
    {
        $role = Role::findOrFail($id); // Find the role or fail
        return response()->json($role); // Return role as JSON
    }

    // Store a new role
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|unique:roles,name|max:255', // Added max length validation
        ]);

        // Create a new role
        $role = Role::create($request->only('name')); // Use only to prevent mass assignment vulnerabilities

        return response()->json($role, 201); // Return created role with 201 status
    }

    // Update an existing role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id); // Find the role or fail

        // Validate the request
        $request->validate([
            'name' => 'nullable|string|unique:roles,name,' . $role->id . '|max:255', // Exclude current role from unique check and added max length validation
        ]);

        // Update the role
        $role->update($request->only('name')); // Use only to prevent mass assignment vulnerabilities

        return response()->json($role); // Return updated role as JSON
    }

    // Delete a specific role
    public function destroy($id)
    {
        $role = Role::findOrFail($id); // Find the role or fail
        $role->delete(); // Delete the role

        return response()->json(null, 204); // Return 204 No Content response
    }
}
