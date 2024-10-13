<?php

namespace App\Http\Controllers;

use App\Models\ServicePart; // Ensure the ServicePart model exists
use Illuminate\Http\Request;

class ServicePartController extends Controller
{
    // List all service parts
    public function index()
    {
        $serviceParts = ServicePart::all();
        return view('service_part.index', compact('serviceParts')); // Return a view with service parts
    }

    // Show a specific service part
    public function show($id)
    {
        $servicePart = ServicePart::findOrFail($id);
        return view('service_part.show', compact('servicePart')); // Return a view for the specific service part
    }

    // Show form for creating a new service part
    public function create()
    {
        return view('service_part.create'); // Return a view with the form to create a service part
    }

    // Store a new service part
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $servicePart = ServicePart::create($request->only('name', 'description', 'price')); // Create the service part
        return redirect()->route('service_parts.index')->with('success', 'Service part created successfully.'); // Redirect to the index with a success message
    }

    // Show form for editing an existing service part
    public function edit($id)
    {
        $servicePart = ServicePart::findOrFail($id);
        return view('service_part.edit', compact('servicePart')); // Return a view with the form to edit the service part
    }

    // Update an existing service part
    public function update(Request $request, $id)
    {
        $servicePart = ServicePart::findOrFail($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
        ]);

        $servicePart->update($request->only('name', 'description', 'price')); // Update the service part
        return redirect()->route('service_parts.index')->with('success', 'Service part updated successfully.'); // Redirect to the index with a success message
    }

    // Delete a specific service part
    public function destroy($id)
    {
        $servicePart = ServicePart::findOrFail($id);
        $servicePart->delete(); // Delete the service part
        return redirect()->route('service_parts.index')->with('success', 'Service part deleted successfully.'); // Redirect to the index with a success message
    }

    // User view for service parts
    public function userView()
    {
        $serviceParts = ServicePart::all(); // Retrieve all service parts
        return view('service_part.user', compact('serviceParts')); // Return user view with all service parts
    }
}
