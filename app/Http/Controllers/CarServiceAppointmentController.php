<?php

namespace App\Http\Controllers;

use App\Models\CarServiceAppointment;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service; // Import the Service model
use App\Models\User; // Import the User model

class CarServiceAppointmentController extends Controller
{
    // Display appointments for the logged-in user
    public function userAppointment()
{
    $appointments = CarServiceAppointment::where('user_id', Auth::id())
        ->with('car', 'service') // Load related car and service
        ->get();

    $cars = Car::all(); // Fetch all cars
    $services = Service::all(); // Fetch all services

    return view('appointments.userAppointment', compact('appointments', 'cars', 'services'));
}


    // Display all appointments for admin
    public function adminAppointment()
    {
        $appointments = CarServiceAppointment::with('user', 'car', 'service')->get();
        return view('appointments.adminAppointment', compact('appointments'));
    }

    // Store a new appointment (for users)
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'service_id' => 'required|exists:services,id',
            'appointment_date' => 'required|date',
            'status' => 'nullable|in:Pending,Completed,Cancelled',
        ]);
    
        CarServiceAppointment::create([
            'user_id' => $request->user_id,  // Use the user ID from the form
            'car_id' => $request->car_id,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status ?? 'Pending',
        ]);
    
        return redirect()->route('appointments.userView')->with('success', 'Appointment created successfully!');
    }

    // Update an existing appointment
    public function update(Request $request, $id)
    {
        $appointment = CarServiceAppointment::findOrFail($id);
        $request->validate([
            'car_id' => 'nullable|exists:cars,id',
            'service_id' => 'nullable|exists:services,id',
            'appointment_date' => 'nullable|date',
            'appointment_time' => 'nullable|date_format:H:i',
            'status' => 'nullable|in:Pending,Completed,Cancelled',
        ]);

        $appointment->update($request->only('car_id', 'service_id', 'appointment_date', 'appointment_time', 'status'));

        return redirect()->route('appointments.adminView')->with('success', 'Appointment updated successfully!');
    }

    // Delete an appointment
    public function destroy($id)
    {
        $appointment = CarServiceAppointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.adminView')->with('success', 'Appointment deleted successfully!');
    }

    // Show form for creating a new appointment
    public function create()
    {
        // Fetch cars and services for the dropdowns
        $cars = Car::all();
        $services = Service::all();
        return view('appointments.create', compact('cars', 'services'));
    }

    // Display the form for editing an existing appointment
    public function edit($id)
    {
        $appointment = CarServiceAppointment::findOrFail($id);
        $cars = Car::all();
        $services = Service::all(); 
        return view('appointments.edit', compact('appointment', 'cars', 'services'));
    }
}
