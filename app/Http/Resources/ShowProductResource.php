<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Product; // Make sure to import the Product model

class ShowProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $category = $this->whenLoaded('categories', function () {
            $category = $this->categories->first();
            if ($category) {
                return [
                    'category_name' => $category->name,
                    'category_slug' => $category->slug,
                ];
            }
            return null;
        });

        $randomProducts = Product::inRandomOrder()->take(5)->get();

        return array_merge(parent::toArray($request), [
            'category_name' => $category['category_name'] ?? null,
            'category_slug' => $category['category_slug'] ?? null,
            'attributes' => $this->whenLoaded('attributes', function () {
                return $this->attributes->map(function ($attribute) {
                    return [
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'pivot' => [
                            'value' => $attribute->pivot->value,
                        ],
                    ];
                });
            }),
            'stock' => $this->whenLoaded('stock'),
            'reviews' => $this->whenLoaded('reviews'),
            'related_products' => $this->whenLoaded('relatedProducts', function () {
                return $this->relatedProducts->map(function ($relatedProduct) {
                    return [
                        'id' => $relatedProduct->id,
                        'main_image' => $relatedProduct->main_image,
                        'category_slug' => $relatedProduct->categories->first() ? $relatedProduct->categories->first()->slug : null,
                    ];
                });
            }),
            'random_products' => $randomProducts->map(function ($randomProduct) {
                return [
                    'id' => $randomProduct->id,
                    'name' => $randomProduct->name,
                    'main_image' => $randomProduct->main_image,
                    'category_slug' => $randomProduct->categories->first() ? $randomProduct->categories->first()->slug : null,
                    'catalogue_price' => $randomProduct->catalogue_price,
                ];
            }),
        ]);
    }
}
