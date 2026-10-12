<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class MembershipFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'organization_id' => Organization::factory(),
            'joined_at' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'status' => 'active',
        ];
    }
}
