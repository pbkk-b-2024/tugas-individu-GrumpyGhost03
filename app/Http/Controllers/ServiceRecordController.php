<?php

namespace App\Http\Controllers;

use App\Models\ServiceRecord;
use App\Models\Service;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    // Display all service records for admin
    public function adminIndex()
    {
        $serviceRecords = ServiceRecord::all();
        $cars = Car::all();
        $services = Service::all();
        $users = User::all();
        return view('service_record.admin', compact('serviceRecords'));
    }

    // Show form for creating a new service record
    public function create()
    {
        $services = Service::all();
        $cars = Car::all();
        $users = User::all();
        return view('service_record.create', compact('services', 'cars', 'users'));
    }

    // Store a new service record
    public function store(Request $request)
    {
        $this->validateServiceRecord($request);

        ServiceRecord::create($request->all());

        return redirect()->route('service_records.index')->with('success', 'Service record created successfully.');
    }

    // Show form for editing a service record
    public function edit($id)
    {
        $serviceRecord = ServiceRecord::findOrFail($id);
        $services = Service::all();
        $cars = Car::all();
        $users = User::all();
        return view('service_record.edit', compact('serviceRecord', 'services', 'cars', 'users'));
    }

    // Update an existing service record
    public function update(Request $request, $id)
    {
        $serviceRecord = ServiceRecord::findOrFail($id);
        $this->validateServiceRecord($request);

        $serviceRecord->update($request->all());

        return redirect()->route('service_records.index')->with('success', 'Service record updated successfully.');
    }

    // Delete a service record
    public function destroy($id)
    {
        $serviceRecord = ServiceRecord::findOrFail($id);
        $serviceRecord->delete();

        return redirect()->route('service_records.index')->with('success', 'Service record deleted successfully.');
    }

    // Validate service record input
    protected function validateServiceRecord(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'service_date' => 'required|date',
            'total_price' => 'required|numeric',
        ]);
    }
}
