<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('now', '+30 days');
        $end = (clone $start);
        $end->modify('+3 days');

        return [
            'user_id' => User::factory(),
            'property_id' => Property::factory(),
            'start_date' => $start,
            'end_date' => $end,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}