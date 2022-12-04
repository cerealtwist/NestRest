<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'hotel_id' => Hotel::factory(),
            'room_id' => Room::factory(),
            'booked_date' => fake()->dateTimeThisDecade(),
            'check_in' => fake()->dateTimeThisDecade(),
            'check_out' => fake()->dateTimeThisDecade(),
        ];
    }
}
