<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = fake()->randomElement(['I', 'B']);
        $name = $type == 'I' ? fake()->name() : fake()->company();
        $gender = $type == 'I' ? fake()->randomElement(['Male', 'Female']) : NULL;
        $birthdate = $type == 'I' ? fake()->dateTimeBetween('1950-01-01', '2003-12-31') : NULL;

        return [
            'name' => $name,
            'type' => $type,
            'email' => fake()->unique()->email(),
            'gender'=> $gender,
            'date_of_birth' => $birthdate,
        ];
    }
}
