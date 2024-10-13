<?php

namespace App\Http\Controllers;

use App\Models\RoleHasPermission; // Adjust the namespace if needed
use Illuminate\Http\Request;

class RoleHasPermissionController extends Controller
{
    // List all role-permission associations
    public function index()
    {
        $rolePermissions = RoleHasPermission::with(['role', 'permission'])->get(); // Eager load roles and permissions
        return response()->json($rolePermissions); // Return as JSON
    }

    // Show a specific role-permission association
    public function show($id)
    {
        $rolePermission = RoleHasPermission::with(['role', 'permission'])->findOrFail($id); // Eager load for the specific ID
        return response()->json($rolePermission); // Return as JSON
    }

    // Store a new role-permission association
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id', // Ensure the role exists
            'permission_id' => 'required|exists:permissions,id', // Ensure the permission exists
        ]);

        $rolePermission = RoleHasPermission::create($request->only('role_id', 'permission_id')); // Create using only specified fields
        return response()->json($rolePermission, 201); // Return created association with 201 status
    }

    // Update an existing role-permission association
    public function update(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id', // Ensure the role exists
            'permission_id' => 'required|exists:permissions,id', // Ensure the permission exists
        ]);

        $rolePermission = RoleHasPermission::findOrFail($id); // Find or fail
        $rolePermission->update($request->only('role_id', 'permission_id')); // Update using only specified fields
        return response()->json($rolePermission); // Return updated association as JSON
    }

    // Delete a specific role-permission association
    public function destroy($id)
    {
        $rolePermission = RoleHasPermission::findOrFail($id); // Find or fail
        $rolePermission->delete(); // Delete the association
        return response()->json(null, 204); // Return 204 No Content response
    }
}
