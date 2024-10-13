@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Edit Customer</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
        </div>
        <div class="form-group mb-3">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address">{{ old('address', $customer->address) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Customer</button>
    </form>
</div>
@endsection
