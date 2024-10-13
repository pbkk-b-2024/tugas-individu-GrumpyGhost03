<!-- resources/views/cars/edit.blade.php -->

@extends('layouts.adminMaster')
@section('title', 'Edit Car')
@section('content')
<div class="container mt-4">
    <h2>Edit Car</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" class="form-control" name="make" id="make" value="{{ $car->make }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" name="model" id="model" value="{{ $car->model }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" class="form-control" name="year" id="year" value="{{ $car->year }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" value="{{ $car->price }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="{{ $car->stock }}" required>
        </div>
        <div class="mb-3">
            <label for="vin" class="form-label">VIN</label>
            <input type="text" class="form-control" name="vin" id="vin" value="{{ $car->vin }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Car Image</label>
            <input type="file" class="form-control" name="image" id="image">
            @if ($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->model }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Car</button>
    </form>
</div>
@endsection