@extends('layouts.adminMaster')

@section('title', 'Create Appointment')

@section('content')
<div class="container mt-5">
    <h1>Create New Appointment</h1>
    <form method="POST" action="{{ route('appointments.store') }}">
        @csrf
        <div class="mb-3">
            <label for="car_id" class="form-label">Car</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">Select a car</option>
                <!-- Populate with cars -->
            </select>
        </div>
        <div class="mb-3">
            <label for="service_id" class="form-label">Service</label>
            <select name="service_id" id="service_id" class="form-select" required>
                <option value="">Select a service</option>
                <!-- Populate with services -->
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_date" class="form-label">Date</label>
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">Time</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Appointment</button>
    </form>
</div>
@endsection
