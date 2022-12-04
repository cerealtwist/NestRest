<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = fake()->randomElement(['Booked', 'Paid']);

        return [
            'customer_id' => Customer::factory(),
            'room_id' => Room::factory(),
            'reservation_id' => Reservation::factory(),
            'price' => fake()->numberBetween(150000, 10000000),
            'status' => $status,
            'booked_date' => fake()->dateTimeThisDecade(),
            'paid_date' => $status == 'Paid' ? fake()->dateTimeThisDecade() : NULL
        ];
    }
}
