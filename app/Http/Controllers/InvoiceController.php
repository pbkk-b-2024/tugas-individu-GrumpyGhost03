<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Customer;

class InvoiceController extends Controller
{
    // List all invoices
    public function index()
    {
        $invoices = Invoice::with('customer')->get(); // Eager load customers
        return view('invoice.admin', compact('invoices'));
    }

    // Show the form for creating a new invoice
    public function create()
    {
        $customers = Customer::all(); // Get all customers for the dropdown
        return view('invoice.create', compact('customers')); // Pass customers to the view
    }

    // Store a newly created invoice
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id', // Ensure the reference is correct
            'total' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
        ]);

        // Create invoice without car_id
        Invoice::create($request->only('customer_id', 'total', 'invoice_date'));

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    // Show the form for editing an invoice
    public function edit($id)
    {
        $invoice = Invoice::with('customer')->findOrFail($id); // Eager load customer
        $customers = Customer::all(); // Get all customers for the dropdown
        return view('invoice.edit', compact('invoice', 'customers')); // Pass invoice and customers to the view
    }

    // Update the specified invoice
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id', // Ensure the reference is correct
            'total' => 'nullable|numeric|min:0',
            'invoice_date' => 'nullable|date',
        ]);

        // Update invoice without car_id
        $invoice->update($request->only('customer_id', 'total', 'invoice_date'));

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    // Delete the specified invoice
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }

    // Display a single invoice
    public function show($id)
    {
        $invoice = Invoice::with('customer')->findOrFail($id); // Eager load customer
        return view('invoice.show', compact('invoice')); // Adjust view as necessary
    }
}
