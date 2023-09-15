<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name'=>$this->faker->words(1,true),
            'product_price'=>$this->faker->numberBetween(1000,1000000),
            'product_image'=>$this->faker->imageUrl(360,360,'vegetables',true),
            'stocks'=>$this->faker->numberBetween(1,30),
            'description'=>$this->faker->sentence(5)

        ];
    }
}
