<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Admin/owner creates invoices
    }

    public function rules(): array
    {
        return [
            'contract_id' => ['required', 'exists:contracts,id'],
            'invoice_date' => ['required', 'date'],
            'amount_due' => ['required', 'numeric', 'min:0.01'],
        ];
    }
}