<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number' => fake()->unique()->numberBetween(1, 500),
            'hotel_id' => Hotel::factory(),
            'room_type' => fake()->randomElement(['Single', 'Double', 'Triple', 'Quad']),
            'price' => fake()->numberBetween(150000, 1000000),
            'status' => fake()->randomElement(['Vacant', 'Occupied'])
        ];
    }
}
