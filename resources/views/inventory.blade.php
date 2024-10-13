@extends('layouts.master')

@section('title', 'Car Inventory')

@section('content')
<div class="container">
    <h1>Car Inventory</h1>

    <div class="row">
        @foreach ($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/' . $car->image) }}" class="card-img-top" alt="{{ $car->model }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->model }}</h5>
                    <p class="card-text">{{ $car->description }}</p>
                    <p class="card-text">Price: ${{ number_format($car->price, 2) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
