@extends('layouts.adminMaster')

@section('title', 'Edit Maintenance Schedule')

@section('content')
<div class="container">
    <h2>Edit Maintenance Schedule</h2>
    <form action="{{ route('maintenance.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="car_id">Car</label>
            <select name="car_id" id="car_id" class="form-control">
                @foreach ($cars as $car)
                    <option value="{{ $car->id }}" {{ $car->id == $schedule->car_id ? 'selected' : '' }}>
                        {{ $car->make }} {{ $car->model }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="service_id">Service</label>
            <select name="service_id" id="service_id" class="form-control">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" {{ $service->id == $schedule->service_id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="scheduled_date">Scheduled Date</label>
            <input type="date" class="form-control" id="scheduled_date" name="scheduled_date" value="{{ $schedule->scheduled_date }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $schedule->description }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
