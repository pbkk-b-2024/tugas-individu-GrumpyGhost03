@extends('layouts.adminMaster')

@section('title', 'Edit Service')

@section('content')
<div class="container mt-5">
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $service->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
