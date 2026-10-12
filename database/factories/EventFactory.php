<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('now', '+6 months');

        return [
            'organization_id' => Organization::factory(),
            'title' => fake()->randomElement([
                'Leadership Seminar',
                'Campus Tech Workshop',
                'Student General Assembly',
                'Community Outreach',
                'Organization Orientation'
            ]),
            'description' => fake()->paragraph(),
            'location' => fake()->randomElement([
                'School Auditorium', 'Computer Laboratory',
                'Conference Room', 'Campus Activity Center'
            ]),
            'start_at' => $start,
            'end_at' => (clone $start)->modify('+2 hours'),
            'status' => 'upcoming',
        ];
    }
}
