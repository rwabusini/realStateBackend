<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'owner_id' => User::factory(), // Automatically creates a user
            'address' => $this->faker->streetAddress,
            'price_per_day' => $this->faker->randomFloat(2, 50, 500),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'available' => $this->faker->boolean,
        ];
    }
}