<?php
namespace Database\Factories;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    protected $model = Unit::class;

    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'name' => $this->faker->word . ' Unit', // ✅ Always provides a name
            'price' => $this->faker->randomFloat(2, 50, 300),
            'type' => $this->faker->randomElement(['studio', '1-bedroom', '2-bedroom']),
            'rooms' => $this->faker->numberBetween(1, 4),
            'furniture_type' => $this->faker->randomElement(['fully', 'semi', 'unfurnished']),
            'status' => 'available',
            'services' => 'wifi,ac,parking',
            'image_url' => null,
        ];
    }
}