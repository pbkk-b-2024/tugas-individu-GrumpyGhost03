@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Add New Service Record</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('service_records.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="service_id">Service</label>
            <select class="form-control" id="service_id" name="service_id">
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="car_id">Car</label>
            <select class="form-control" id="car_id" name="car_id">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="user_id">User</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="service_date">Service Date</label>
            <input type="date" class="form-control" id="service_date" name="service_date">
        </div>
        <div class="form-group mb-3">
            <label for="total_price">Total Price</label>
            <input type="number" class="form-control" id="total_price" name="total_price">
        </div>
        <button type="submit" class="btn btn-primary">Add Record</button>
    </form>
</div>
@endsection
