<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->company() . ' Student Organization';

        return [
            'name' => $name,
            'acronym' => null,
            'description' => fake()->sentence(12),
            'category' => fake()->randomElement([
                'Academic', 'Technology', 'Arts and Culture',
                'Sports', 'Community Service'
            ]),
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement(['active', 'active', 'inactive']),
        ];
    }
}
