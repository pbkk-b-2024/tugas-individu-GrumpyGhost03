@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Service Parts</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('service_parts.create') }}" class="btn btn-primary mb-3">Add New Service Part</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serviceParts as $part)
                <tr>
                    <td>{{ $part->id }}</td>
                    <td>{{ $part->name }}</td>
                    <td>{{ $part->price }}</td>
                    <td>
                        <a href="{{ route('service_parts.edit', $part->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('service_parts.destroy', $part->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
