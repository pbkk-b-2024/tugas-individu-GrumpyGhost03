@extends('layouts.adminMaster')

@section('content')
<div class="container">
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>
    <table class="table">
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->make }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>${{ $car->price }}</td>
                <td>{{ $car->stock }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
