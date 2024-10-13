<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Display all cars for API
    public function index()
    {
        return response()->json(Car::all()); // Return JSON response
    }

    // Display a single car for API
    public function show($id)
    {
        return response()->json(Car::findOrFail($id)); // Return JSON response
    }

    // Store a new car (Create) via API
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vin' => 'required|string|unique:cars,vin',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $car = Car::create($validatedData);
        return response()->json($car, 201); // Return created car with status 201
    }

    // Update an existing car (Update) via API
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $validatedData = $request->validate([
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer|between:1900,' . date('Y'),
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vin' => 'required|string|unique:cars,vin,' . $id,
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $imagePath = $request->file('image')->store('car_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $car->update($validatedData);
        return response()->json($car); // Return updated car
    }

    // Delete a car (Delete) via API
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();
        return response()->noContent(); // Return no content on successful deletion
    }

    // Display all cars for normal users
    public function userView()
    {
        $cars = Car::all();
        return view('cars.user', compact('cars'));
    }

    // Display all cars for admins with CRUD functionality
    public function adminView()
    {
        $cars = Car::all();
        return view('cars.admin', compact('cars'));
    }

    // Show the form for creating a new car
    public function create()
    {
        return view('cars.create'); // Create a view for the form
    }

    // Store a newly created car in the database (for web)
    public function storeWeb(Request $request)
    {
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|between:1900,' . date('Y'),
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vin' => 'required|string|unique:cars,vin',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('car_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Car::create($validatedData);
        return redirect()->route('cars.admin')->with('success', 'Car created successfully.');
    }

    // Show the form for editing an existing car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car')); // Create an edit view
    }

    // Update an existing car in the database (for web)
    // app/Http/Controllers/CarController.php
    
    public function updateWeb(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $validatedData = $request->validate([
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'year' => 'nullable|integer|between:1900,' . date('Y'),
            'price' => 'nullable|numeric',
            'vin' => 'required|string|unique:cars,vin,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $imagePath = $request->file('image')->store('car_images', 'public');
            $validatedData['image'] = $imagePath;
        }
    
        $car->update($validatedData);
        return redirect()->route('cars.admin')->with('success', 'Car updated successfully!');
    }
}