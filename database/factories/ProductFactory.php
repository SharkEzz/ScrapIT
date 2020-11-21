<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'product-'.random_int(1, 200),
            'description' => $this->faker->text(50),
            'url' => $this->faker->url,
            'price' => random_int(50, 200),
            'scraper_id' => random_int(1, 2)
        ];
    }
}
