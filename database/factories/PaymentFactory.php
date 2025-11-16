<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        $amount = $this->faker->randomFloat(2, 50, 1000);
        $status = $this->faker->randomElement(['completed', 'pending', 'failed']);

        return [
            'invoice_id' => Invoice::factory(),
            'amount' => $amount,
            'payment_method' => $this->faker->randomElement(['bank_transfer', 'credit_card', 'paypal']),
            'status' => $status,
            'paid_at' => $status === 'completed' ? now() : null,
        ];
    }
}