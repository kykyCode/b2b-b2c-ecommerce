<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\ProductAttributeProvider;

class ProductAttributeFactory extends Factory
{
    protected $model = ProductAttribute::class;

    public function definition()
    {
        $faker = $this->withFaker();

        $faker->addProvider(new ProductAttributeProvider($faker));

        $attribute = Attribute::inRandomOrder()->first();

        $value = match ($attribute->key) {
            'country' => $faker->country(),
            'color' => $faker->color(),
            'weight' => $faker->weight(),
            'size' => $faker->size(),
            'material' => $faker->material(),
            default => 'Unknown',
        };

        $optional_value = null;
        if ($attribute->key === 'color') {
            $optional_value = $faker->hexColor();
        }

        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'attribute_id' => $attribute->id,
            'value' => $value,
            'optional_value' => $optional_value,
        ];
    }
}
