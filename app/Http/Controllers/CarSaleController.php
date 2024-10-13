<?php

namespace App\Http\Controllers;

use App\Models\CarSale;
use App\Models\Car;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CarSaleController extends Controller
{
    // Display all sales for admins
    public function adminIndex()
    {
        $sales = CarSale::with(['car', 'customer'])->get();
        $cars = Car::all(); 
        $customers = Customer::all(); 

        return view('car_sale.admin_sales', compact('sales', 'cars', 'customers'));
    }

    // Show the form for creating a new sale
    public function create()
    {
        $cars = Car::all();
        $customers = Customer::all(); // Changed from $customer to $customers
        return view('car_sale.create', compact('cars', 'customers')); // Changed from 'customer' to 'customers'
    }

    // Store a newly created sale in the database
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:users,id',
            'sale_date' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        CarSale::create($request->only('car_id', 'customer_id', 'sale_date', 'total_price'));

        return redirect()->route('sales.adminIndex')->with('success', 'Sale added successfully!');
    }

    // Show the form for editing an existing sale
    public function edit($id)
    {
        $carSale = CarSale::findOrFail($id);
        $cars = Car::all();
        $customers = Customer::all(); // Changed from $users to $customers

        return view('car_sale.edit', compact('carSale', 'cars', 'customers')); // Changed from 'customer' to 'customers'
    }

    // Update an existing sale in the database
    public function update(Request $request, $id)
    {
        $carSale = CarSale::findOrFail($id);
        $request->validate([
            'car_id' => 'nullable|exists:cars,id',
            'customer_id' => 'nullable|exists:users,id',
            'sale_date' => 'nullable|date',
            'total_price' => 'nullable|numeric',
        ]);

        $carSale->update($request->only('car_id', 'customer_id', 'sale_date', 'total_price'));

        return redirect()->route('sales.adminIndex')->with('success', 'Sale updated successfully!');
    }

    // Delete a sale from the database
    public function destroy($id)
    {
        $carSale = CarSale::findOrFail($id);
        $carSale->delete();

        return redirect()->route('sales.adminIndex')->with('success', 'Sale deleted successfully!');
    }

    // Display all sales for API
    public function index()
    {
        return response()->json(CarSale::with(['car', 'customer'])->get()); // Return JSON response for all sales
    }

    // Display a single sale for API
    public function show($id)
    {
        return response()->json(CarSale::with(['car', 'customer'])->findOrFail($id)); // Return JSON response for a single sale
    }
    
    // Store a new sale via API
    public function storeApi(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'customer_id' => 'required|exists:customer,id',
            'sale_date' => 'required|date',
            'total_price' => 'required|numeric',
        ]);

        $carSale = CarSale::create($request->only('car_id', 'customer_id', 'sale_date', 'total_price'));
        return response()->json($carSale, 201); // Return created sale with status 201
    }

    // Update an existing sale via API
    public function updateApi(Request $request, $id)
    {
        $carSale = CarSale::findOrFail($id);
        $request->validate([
            'car_id' => 'nullable|exists:cars,id',
            'customer_id' => 'nullable|exists:users,id',
            'sale_date' => 'nullable|date',
            'total_price' => 'nullable|numeric',
        ]);

        $carSale->update($request->only('car_id', 'customer_id', 'sale_date', 'total_price'));
        return response()->json($carSale); // Return updated sale
    }

    // Delete a sale via API
    public function destroyApi($id)
    {
        $carSale = CarSale::findOrFail($id);
        $carSale->delete();

        return response()->noContent(); // Return no content on successful deletion
    }
}
