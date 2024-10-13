<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    // List all permissions
    public function index()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    // Show a specific permission
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    // Store a new permission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        // Create a new permission
        $permission = Permission::create($request->only('name')); // Use only to prevent mass assignment vulnerabilities

        return response()->json($permission, 201); // Return created permission with 201 status
    }

    // Update an existing permission
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id); // Find the permission or fail

        // Validate the request
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id . '|max:255', // Exclude current permission from unique check
        ]);

        // Update the permission
        $permission->update($request->only('name')); // Use only to prevent mass assignment vulnerabilities

        return response()->json($permission);
    }

    // Delete a specific permission
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id); // Find the permission or fail
        $permission->delete(); // Delete the permission

        return response()->json(null, 204); // Return 204 No Content response
    }
}
