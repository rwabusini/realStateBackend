<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;

class PaymentController extends Controller
{
    public function store(Request $request, Invoice $invoice)
    {
        $payment = $invoice->payments()->create($request->validate([
            'amount' => 'required|numeric|min:0.01|max:' . $invoice->amount_due,
            'payment_method' => 'required|string',
        ]));

        // Update invoice status
        $invoice->amount_paid += $payment->amount;
        if ($invoice->amount_paid >= $invoice->amount_due) {
            $invoice->status = 'paid';
        } elseif ($invoice->amount_paid > 0) {
            $invoice->status = 'partially_paid';
        }
        $invoice->save();

        return new PaymentResource($payment);
    }
}