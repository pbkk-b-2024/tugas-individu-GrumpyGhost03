<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use Illuminate\Http\Request;
use App\Models\Car; // Import the Car model
use App\Models\Service; // Import the Service model


class MaintenanceScheduleController extends Controller
{
    // List all maintenance schedules
    public function index()
    {
        $schedules = MaintenanceSchedule::all();
        $cars = Car::all(); // Retrieve the cars
        $services = Service::all(); // Retrieve the services
    
        return view('maintenance.admin_maintenance', compact('schedules', 'cars', 'services')); // Pass $schedules, $cars, and $services to the view
    }
    

    // Show the form for creating a new maintenance schedule
    public function create()
{
    $cars = Car::all(); // Retrieve all cars
    $services = Service::all(); // Retrieve all services
    
    return view('maintenance.create', compact('cars', 'services')); // Pass to the create view
}

    // Store a newly created maintenance schedule
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id', // Must reference a valid car ID
            'service_id' => 'required|exists:services,id', // Must reference a valid service ID
            'scheduled_date' => 'required|date', // Must be a valid date
            'description' => 'nullable|string|max:255', // Optional description
        ]);

        MaintenanceSchedule::create($request->only('car_id', 'service_id', 'scheduled_date', 'description')); // Create new schedule

        return redirect()->route('maintenance.admin_maintenance')->with('success', 'Maintenance schedule created successfully.');
    }

    // Show the form for editing an existing maintenance schedule
    public function edit($id)
{
    $schedule = MaintenanceSchedule::findOrFail($id); // Find schedule by ID or fail
    $cars = Car::all(); // Retrieve all cars
    $services = Service::all(); // Retrieve all services

    return view('maintenance.edit', compact('schedule', 'cars', 'services')); // Pass the variables to the view
}

    // Update the specified maintenance schedule
    public function update(Request $request, $id)
    {
        $schedule = MaintenanceSchedule::findOrFail($id); // Find schedule by ID or fail
        
        $request->validate([
            'car_id' => 'nullable|exists:cars,id', // Optional, but if provided, must be a valid car ID
            'service_id' => 'nullable|exists:services,id', // Optional, but if provided, must be a valid service ID
            'scheduled_date' => 'nullable|date', // Optional, but if provided, must be a valid date
            'description' => 'nullable|string|max:255', // Optional description
        ]);

        $schedule->update($request->only('car_id', 'service_id', 'scheduled_date', 'description')); // Update schedule

        return redirect()->route('maintenance.admin_maintenance')->with('success', 'Maintenance schedule updated successfully.');
    }

    // Delete the specified maintenance schedule
    public function destroy($id)
    {
        $schedule = MaintenanceSchedule::findOrFail($id); // Find schedule by ID or fail
        $schedule->delete(); // Delete the schedule

        return redirect()->route('maintenance.admin_maintenance')->with('success', 'Maintenance schedule deleted successfully.');
    }
}
