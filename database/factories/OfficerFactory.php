<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'organization_id' => Organization::factory(),
            'position' => fake()->randomElement([
                'President', 'Vice President', 'Secretary',
                'Treasurer', 'Auditor'
            ]),
            'start_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'end_date' => null,
        ];
    }
}
