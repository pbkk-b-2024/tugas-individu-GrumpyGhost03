@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Service Records</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('service_records.create') }}" class="btn btn-primary mb-3">Add New Record</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service</th>
                <th>Car</th>
                <th>User</th>
                <th>Service Date</th>
                <th>Service Price</th>
                <th>Parts Total Price</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serviceRecords as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ optional($record->service)->name }}</td>
                    <td>{{ optional($record->car)->id }}</td>
                    <td>{{ optional($record->user)->id }}</td>
                    <td>{{ $record->service_date }}</td>
                    <td>{{ $record->service_price }}</td>
                    <td>{{ $record->parts_total_price }}</td>
                    <td>{{ $record->total_price }}</td>
                    <td>
                        <a href="{{ route('service_records.edit', $record->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('service_records.destroy', $record->id) }}" method="POST" class="d-inline">
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
