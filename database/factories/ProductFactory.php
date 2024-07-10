<?php

namespace Database\Factories;

use App\Models\Product;
use App\Faker\ProductProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $this->faker->addProvider(new ProductProvider($this->faker));

        return [
            'sku' => $this->faker->unique()->numerify('SKU-#####'),
            'name' => [
                'en' => $this->faker->productName(),
                'fr' => $this->faker->productName()
            ],
            'desc' => [
                'en' => $this->faker->productDescription(),
                'fr' => $this->faker->productDescription()
            ],
            'main_image' => $this->faker->productMainImage(),
            'images' => [
                $this->faker->productMainImage(),
                $this->faker->productMainImage(),
                $this->faker->productMainImage()
            ],
            'catalogue_price' => $this->faker->randomFloat(2, 10, 1000),
            'brand' => $this->faker->optional()->company,
            'parent_id' => null,
            'group' => $this->faker->productGroup(),
        ];
    }
}
