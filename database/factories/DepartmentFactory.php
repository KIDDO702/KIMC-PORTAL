<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' =>fake()->boolean(),
            'description' => fake()->paragraph(),
            'location' => fake()->address(),
            'contact' => fake()->email(),
            'thumbnail' => fake()->image(),
            'featured' => fake()->boolean()
        ];
    }
}
