<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'category' => 'recycle , second',
            'price' => '1000' ,
            'description' => fake()->paragraph(2),
            'image' => "https://picsum.photos/id/" . fake()->numberBetween(1, 200) . "/640/" . floor(640 * 1.414),
        ];
    }
}
