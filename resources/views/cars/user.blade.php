<!-- resources/views/cars/user.blade.php -->

@extends('layouts.master')
@section('content')
<h1>Car Inventory</h1>
<div class="row mt-4">
    @if($cars->count() > 0)
        @foreach ($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if ($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->model }}">
                @else
                    <img src="{{ asset('images/default-car.png') }}" class="card-img-top" alt="Default Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $car->model }}</h5>
                    <p class="card-text">{{ $car->description }}</p>
                    <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                    <p class="card-text">Year: {{ $car->year }}</p>
                    <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>No cars available.</p>
    @endif
</div>
@endsection