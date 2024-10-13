@extends('layouts.master')

@section('content')
<h1>Car Inventory</h1>
<!-- Add Car button -->
<a href="{{ route('cars.create') }}" class="btn btn-primary">Add Car</a>

<!-- Check if cars exist -->
<div class="row mt-4">
    @if($cars->count() > 0)
        @foreach ($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/' . $car->image) }}" class="card-img-top" alt="{{ $car->model }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->model }}</h5>
                    <p class="card-text">{{ $car->description }}</p>
                    <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                    <p class="card-text">Year: {{ $car->year }}</p>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No cars available.</p>
    @endif
</div>

@endsection
