<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Tenant;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        $end = (clone $start);
        $end->modify('+1 year');

        return [
            'tenant_id' => Tenant::factory(),
            'property_id' => Property::factory(),
            'start_date' => $start,
            'end_date' => $end,
            'monthly_rent' => $this->faker->randomFloat(2, 800, 3000),
            'contract_file' => null,
            'status' => 'active',
        ];
    }
}