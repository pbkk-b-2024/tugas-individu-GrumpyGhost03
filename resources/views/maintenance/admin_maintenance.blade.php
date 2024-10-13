@extends('layouts.adminMaster')

@section('title', 'Maintenance Schedules')

@section('content')
<div class="container mt-5">
    <h1>Maintenance Schedule Management</h1>

    <h2>Add New Maintenance Schedule</h2>
    <form method="POST" action="{{ route('maintenance.store') }}">
        @csrf
        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">Select a car</option>
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="maintenance_type" class="form-label">Maintenance Type</label>
            <input type="text" name="maintenance_type" id="maintenance_type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Schedule</button>
    </form>

    <h2 class="mt-5">Current Maintenance Schedules</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Maintenance Type</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }}</td>
                    <td>{{ $schedule->car->make }} {{ $schedule->car->model }}</td>
                    <td>{{ $schedule->maintenance_type }}</td>
                    <td>{{ $schedule->due_date }}</td>
                    <td>
                        <a href="{{ route('maintenance.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('maintenance.destroy', $schedule->id) }}" method="POST" style="display:inline;">
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
