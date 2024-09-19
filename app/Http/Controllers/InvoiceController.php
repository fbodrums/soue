<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {

        $invoice = Invoice::create($request->all());

        if ($request->has('items')) {
            foreach ($request->items as $itemData) {
                $invoice->items()->create($itemData);
            }
        }

        if ($request->has('phones')) {
            foreach ($request->phones as $itemData) {
                $invoice->phones()->create($itemData);
            }
        }

        return redirect()->route('invoice.index');
    }

    public function show(Invoice $invoice)
    {
        return view('invoice.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoice.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $invoice = Invoice::create($request->all());

        if ($request->has('items')) {
            foreach ($request->items as $itemData) {
                $invoice->items()->create($itemData);
            }
        }

        if ($request->has('phones')) {
            foreach ($request->phones as $itemData) {
                $invoice->phones()->create($itemData);
            }
        }
        return redirect()->route('invoice.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index');
    }
}
