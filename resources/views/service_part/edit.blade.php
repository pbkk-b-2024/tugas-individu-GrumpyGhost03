@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Edit Service Part</h1>

    <form action="{{ route('service_parts.update', $servicePart->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $servicePart->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $servicePart->price }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Service Part</button>
    </form>
</div>
@endsection
