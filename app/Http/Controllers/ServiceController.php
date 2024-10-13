<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // List all services for admin
    public function index()
    {
        return response()->json(Service::all()); // Return all services as JSON
    }

    // Show a specific service
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json($service); // Return the service as JSON
    }

    // Store a new service
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);

        $service = Service::create($request->only('name', 'description', 'price')); // Create the service
        return redirect()->route('services.admin')->with('success', 'Service created successfully!'); // Redirect with success message
    }

    // Update an existing service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
        ]);

        $service->update($request->only('name', 'description', 'price')); // Update the service
        return redirect()->route('services.admin')->with('success', 'Service updated successfully!'); // Redirect with success message
    }

    // Delete a specific service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete(); // Delete the service
        return redirect()->route('services.admin')->with('success', 'Service deleted successfully!'); // Redirect with success message
    }

    // Display all services for users
    public function userView()
    {
        $services = Service::all();
        return view('services.user', compact('services')); // Return user view with all services
    }
    
    // Display all services for admin
    public function adminView()
    {
        $services = Service::all();
        return view('services.admin', compact('services')); // Return admin view with all services
    }

    // Show the form for creating a new service
    public function create()
    {
        return view('services.create'); // Return create service view
    }

    // Show the form for editing an existing service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service')); // Return edit view with service data
    }
}
