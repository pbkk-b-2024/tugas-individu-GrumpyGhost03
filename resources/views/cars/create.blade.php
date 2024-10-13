<!-- resources/views/cars/create.blade.php -->
@extends('layouts.adminMaster')

@section('content')
<div class="container mt-4">
    <h2>Add New Car</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" class="form-control" id="make" name="make" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
       <!-- resources/views/cars/create.blade.php -->

    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Other input fields -->
    <div class="form-group">
        <label for="image">Car Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>
        <div class="form-group">
            <label for="vin">VIN</label>
            <input type="text" class="form-control" name="vin" id="vin" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Car</button>
    </form>
</div>
@endsection
