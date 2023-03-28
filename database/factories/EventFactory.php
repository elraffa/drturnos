<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Doctor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'event' => $this->faker->sentence(),
            'start_date' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 months'),
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
        ];
    }
}
