<?php

namespace App\Http\Controllers;

use App\Models\Customer; // Ensure the Customer model is created
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display all customers for admin
    public function index()
    {
        $customers = Customer::all(); // Retrieve all customers
        return view('customers.admin', compact('customers')); // Pass customers to the index view
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('customers.create'); // Return view for creating a customer
    }

    // Store a newly created customer
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        // Create a new customer with validated data
        Customer::create($request->only('name', 'email', 'phone', 'address'));

        return redirect()->route('customers.admin')->with('success', 'Customer created successfully!'); // Redirect back to index with success message
    }

    // Show the form for editing an existing customer
    public function edit($id)
    {
        $customer = Customer::findOrFail($id); // Find customer or fail
        return view('customers.edit', compact('customer')); // Pass customer to the edit view
    }

    // Update an existing customer
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id); // Find customer or fail

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id, // Ensure the email is unique excluding the current customer
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $customer->update($request->only('name', 'email', 'phone', 'address')); // Update customer with validated data

        return redirect()->route('customers.admin')->with('success', 'Customer updated successfully!'); // Redirect back to index with success message
    }

    // Delete a customer
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id); // Find customer or fail
        $customer->delete(); // Delete the customer

        return redirect()->route('customers.admin')->with('success', 'Customer deleted successfully!'); // Redirect back to index with success message
    }

    // Display the details of a specific customer
    public function show($id)
    {
        $customer = Customer::findOrFail($id); // Find customer or fail
        return view('customers.show', compact('customer')); // Pass customer to the show view
    }
}
