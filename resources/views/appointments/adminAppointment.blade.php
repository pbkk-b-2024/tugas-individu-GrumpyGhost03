@extends('layouts.adminMaster')

@section('title', 'Admin Appointments')

@section('content')
<div class="container mt-5">
<h1>Admin Appointments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Service</th>
                <th>Date</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->user->name }}</td>
                    <td>{{ $appointment->service }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
