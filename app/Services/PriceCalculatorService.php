<?php

namespace App\Services;

use App\Models\Product;

class PriceCalculatorService
{
    public function calculateOrderTotalPrice(array $items, float $shippingPrice): float
    {
        $productIds = array_column($items, 'product_id');
        $products = Product::whereIn('id', $productIds)->select('id', 'catalogue_price')->get()->keyBy('id');

        $total = 0;
        foreach ($items as $item) {
            if (isset($products[$item['product_id']])) {
                $product = $products[$item['product_id']];
                $total += $product->catalogue_price * $item['quantity'];
            }
        }

        $total += $shippingPrice;

        return $total;
    }
}
