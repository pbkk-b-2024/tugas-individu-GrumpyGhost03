@extends('layouts.adminMaster')

@section('content')
<div class="container">
    <h2>Edit Car Sale</h2>
    <form action="{{ route('sales.update', $carSale->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ old('make', $carSale->car->make) }}" required>
        </div>

        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $carSale->car->model) }}" required>
        </div>

        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $carSale->car->year) }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $carSale->car->price) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
