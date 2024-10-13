@extends('layouts.adminMaster')

@section('content')
<div class="container mt-5">
    <h1>Edit Invoice</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="customer_id">Customer</label>
            <select class="form-control" id="customer_id" name="customer_id" required>
                <option value="" disabled>Select a customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ (old('customer_id', $invoice->customer_id) == $customer->id) ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="total">Total</label>
            <input type="number" class="form-control" id="total" name="total" value="{{ old('total', $invoice->total) }}" required min="0" step="0.01">
        </div>

        <div class="form-group mb-3">
            <label for="invoice_date">Invoice Date</label>
            <input type="date" class="form-control" id="invoice_date" name="invoice_date" value="{{ old('invoice_date', \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d')) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Invoice</button>
    </form>
</div>
@endsection
