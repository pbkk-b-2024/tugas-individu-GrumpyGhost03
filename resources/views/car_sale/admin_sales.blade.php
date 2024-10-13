@extends('layouts.adminMaster')

@section('title', 'Admin Sales')

@section('content')
<div class="container mt-5">
    <h1>Car Sales Management</h1>

    <h2>Add New Sale</h2>
    <form method="POST" action="{{ route('sales.store') }}">
        @csrf
        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">Select a car</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label> <!-- Changed from user_id to customer_id -->
            <select name="customer_id" id="customer_id" class="form-select" required>
                <option value="">Select a customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale Date</label>
            <input type="date" name="sale_date" id="sale_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_price" class="form-label">Total Price</label>
            <input type="number" name="total_price" id="total_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Sale</button>
    </form>

    <h2 class="mt-5">Current Sales</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Customer</th>
                <th>Sale Date</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->car->model }}</td>
                    <td>{{ $sale->customer->name }}</td> <!-- Display customer's name instead of ID -->
                    <td>{{ $sale->sale_date }}</td>
                    <td>{{ $sale->total_price }}</td>
                    <td>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
