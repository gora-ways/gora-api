<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Style>
 */
class StyleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'control_number'       => 'CTRL-' . time() . rand(1, 19999),
            'buyer_id'             => $this->faker->buyer()->id,
            'style_number'         => strtoupper($this->faker->bothify('STYLE-###')),
            'pleats_name'          => $this->faker->randomElement(['Box Pleats', 'Knife Pleats', 'Accordion', null]),
            'item_type'            => $this->faker->randomElement(['Dress', 'Skirt', 'Jacket', 'Shirt', 'Pants']),
            'ship_date_from_japan' => $this->faker->optional()->date('Y-m-d'),
            'ship_date_from_cebu'  => $this->faker->optional()->date('Y-m-d'),
            'noumae'               => $this->faker->bothify('N-###'),
            'sample'               => $this->faker->optional()->bothify('Sample-###'),
            'pattern'              => $this->faker->randomElement(['Pattern-A', 'Pattern-B', 'Pattern-C', null]),
        ];
    }
}
