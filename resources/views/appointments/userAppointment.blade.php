@extends('layouts.master')

@section('title', 'User Appointments')

@section('content')
<div class="container mt-5">
    <h1>User Appointments</h1>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ Auth::id() }}" readonly required>
        </div>
        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">Select a car</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select name="service_id" id="service_id" class="form-select" required>
                <option value="">Select a service</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Date & Time</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Appointment</button>
    </form>

    <h2>Your Appointments</h2>
    <ul class="list-group mt-4">
        @if($appointments->isEmpty())
            <li class="list-group-item">No appointments found.</li>
        @else
            @foreach($appointments as $appointment)
                <li class="list-group-item">
                    Service: {{ $appointment->service->name }} <br>
                    Car: {{ $appointment->car->model }} <br>
                    Date: {{ $appointment->appointment_date }} <br>
                    Status: {{ $appointment->status }}
                </li>
            @endforeach
        @endif
    </ul>
</div>
@endsection
