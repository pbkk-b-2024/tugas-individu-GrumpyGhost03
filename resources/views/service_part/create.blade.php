@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Add New Service Part</h1>

    <form action="{{ route('service_parts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Service Part</button>
    </form>
</div>
@endsection
