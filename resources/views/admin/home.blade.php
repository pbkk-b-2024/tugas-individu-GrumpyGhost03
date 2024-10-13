@extends('layouts.adminMaster')

@section('content')
<div class="row mt-4">
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('cars.admin') }}" class="btn btn-secondary btn-lg btn-block">Manage Cars</a>
    </div>
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('sales.adminIndex') }}" class="btn btn-secondary btn-lg btn-block">Manage Sales</a>
    </div>
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('appointments.adminView') }}" class="btn btn-secondary btn-lg btn-block">Manage Appointments</a>
    </div>
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('services.admin') }}" class="btn btn-secondary btn-lg btn-block">Manage Services</a>
    </div>
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('invoices.adminIndex') }}" class="btn btn-secondary btn-lg btn-block">Manage Invoices</a>
    </div>
    <div class="col-md-4 mb-3"> <!-- Add bottom margin for spacing -->
        <a href="{{ route('service_records.adminIndex') }}" class="btn btn-secondary btn-lg btn-block">Manage Service Records</a>
    </div>
    <!-- Add more buttons as needed -->
</div>
@endsection
