<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Resources\InvoiceResource;

class InvoiceController extends Controller
{
    public function index(Contract $contract)
    {
        return InvoiceResource::collection($contract->invoices);
    }

    public function store(Request $request, Contract $contract)
    {
        $invoice = $contract->invoices()->create($request->validate([
            'invoice_date' => 'required|date',
            'amount_due' => 'required|numeric|min:0',
        ]));
        return new InvoiceResource($invoice);
    }

    public function show(Contract $contract, Invoice $invoice)
    {
        if ($invoice->contract_id !== $contract->id) abort(404);
        return new InvoiceResource($invoice);
    }
}