<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Invoice;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Tenant or admin can pay
    }

    public function rules(): array
    {
        return [
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) {
                    $invoice = Invoice::findOrFail($this->route('invoice'));
                    if ($value > ($invoice->amount_due - $invoice->amount_paid)) {
                        $fail('Payment amount exceeds the remaining balance.');
                    }
                }
            ],
            'payment_method' => ['required', 'string'],
        ];
    }
}