@extends('layouts.adminMaster')

@section('title', 'Edit Appointment')

@section('content')
<div class="container mt-5">
    <h1>Edit Appointment</h1>
    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}">
        @csrf
        @method('PUT')
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
            <input type="date" name="appointment_date" id="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">Time</label>
            <input type="time" name="appointment_time" id="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Appointment</button>
    </form>
</div>
@endsection
