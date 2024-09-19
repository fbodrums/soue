<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction();

        try {
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

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return dd($e->getMessage());
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

        DB::beginTransaction();

        try {
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
        } catch (Exception $e) {
            DB::rollBack();
            return dd($e->getMessage());
        }

        return redirect()->route('invoice.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index');
    }
}
