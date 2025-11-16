<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    public function definition(): array
    {
        $due = $this->faker->randomFloat(2, 800, 3000);
        $paid = $this->faker->boolean(30) ? $due : $this->faker->randomFloat(2, 0, $due);

        $status = 'unpaid';
        if ($paid >= $due) $status = 'paid';
        elseif ($paid > 0) $status = 'partially_paid';

        return [
            'contract_id' => Contract::factory(),
            'invoice_date' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'amount_due' => $due,
            'amount_paid' => $paid,
            'status' => $status,
        ];
    }
}