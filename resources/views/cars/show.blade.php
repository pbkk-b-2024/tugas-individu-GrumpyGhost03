@extends('layouts.master')

@section('content')
<div class="car">
    <h1>{{ $car->name }}</h1>
    <p>Model: {{ $car->model }}</p>
    <p>Year: {{ $car->year }}</p>
    <p>Description: {{ $car->description }}</p>
    <p>Price: ${{ number_format($car->price, 2) }}</p>
    <p>VIN: {{ $car->vin }}</p>
    @if ($car->image)
    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" width="300">
    @endif
</div>
@endsection
