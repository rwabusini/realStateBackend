<?php

namespace Database\Factories;

use App\Models\MaintenanceRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaintenanceRequestFactory extends Factory
{
    protected $model = MaintenanceRequest::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'specialty' => $this->faker->randomElement(['electrician', 'plumber', 'painter', 'carpenter']),
        ];
    }
}