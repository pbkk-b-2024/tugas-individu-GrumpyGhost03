@extends('layouts.adminMaster')

@section('title', 'Add New Service')

@section('content')
<div class="container mt-5">
    <h1>Add New Service</h1>

    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Service</button>
    </form>
</div>
@endsection
