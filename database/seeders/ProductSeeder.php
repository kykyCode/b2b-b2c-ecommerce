<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Stock;
use App\Models\Review;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::factory()->count(3000)->create()->each(function ($product) {
            $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);
        });

        $this->createAttributes();
        $this->assignPricesToProducts($products);
        $this->assignAttributesToProducts($products);
        $this->assignStocksToProducts($products);
        $this->assignReviewsToProducts($products);
    }

    private function createAttributes(): void
    {
        $attributes = [
            ['key' => 'country', 'name' => $this->translate(['Country', 'Kraj', 'Pays', 'Land'])],
            ['key' => 'color', 'name' => $this->translate(['Color', 'Kolor', 'Couleur', 'Farbe'])],
            ['key' => 'weight', 'name' => $this->translate(['Weight', 'Waga', 'Poids', 'Gewicht'])],
            ['key' => 'size', 'name' => $this->translate(['Size', 'Rozmiar', 'Taille', 'Größe'])],
            ['key' => 'material', 'name' => $this->translate(['Material', 'Materiał', 'Matériau', 'Material'])],
        ];

        Attribute::insert($attributes);
    }

    private function translate(array $translations): string
    {
        $languages = ['en', 'pl', 'fr', 'gr'];
        return json_encode(array_combine($languages, $translations));
    }

    private function assignPricesToProducts(Collection $products): void
    {
        $prices = $products->flatMap(function ($product) {
            return $this->generatePricesForProduct($product);
        });

        Price::insert($prices->toArray());
    }

    private function generatePricesForProduct(Product $product): SupportCollection
    {
        $cataloguePrice = $product->catalogue_price;
        $priceCount = rand(3, 5);
        $quantities = range(100, $priceCount * 100, 100);

        return collect($quantities)->map(function ($quantity, $index) use ($product, $cataloguePrice) {
            return [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => round($cataloguePrice * (1 - 0.2 * $index), 2),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });
    }

    private function assignAttributesToProducts(Collection $products): void
    {
        $products->each(function ($product) {
            ProductAttribute::factory()->count(5)->create(['product_id' => $product->id]);
        });
    }

    private function assignStocksToProducts(Collection $products): void
    {
        $stocks = $products->map(function ($product) {
            return [
                'product_id' => $product->id,
                'quantity' => rand(10, 100),
                'next_delivery_date' => Carbon::now()->addDays(rand(1, 30))->toDateString(),
                'next_delivery_quantity' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        Stock::insert($stocks->toArray());
    }

    private function assignReviewsToProducts(Collection $products): void
    {
        $products->each(function ($product) {
            Review::factory()->count(5)->create([
                'reviewable_id' => $product->id,
                'reviewable_type' => Product::class,
            ]);
        });
    }
}
