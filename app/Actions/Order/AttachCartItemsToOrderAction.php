<?php

namespace App\Actions\Order;

use Closure;
use App\Models\Order;
use App\Models\Product;
use App\Services\CartService;
use Exception;

class AttachCartItemsToOrderAction
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function handle(Order $order, Closure $next)
    {
        $cartItems = $this->cartService->getCartItems();

        if (empty($cartItems)) {
            throw new Exception('No items found in the session.');
        }

        $productIds = array_keys($cartItems);
        $products = Product::whereIn('id', $productIds)->get();

        if ($products->isEmpty()) {
            throw new Exception('No products found for the given cart items.');
        }

        $orderItems = $this->mapProductsToCartItems($products, $cartItems);

        $order->items()->createMany($orderItems);

        return $next($order);
    }

    /**
     * Map products to cart items.
     *
     * @param \Illuminate\Support\Collection $products
     * @param array $cartItems
     * @return array
     */
    private function mapProductsToCartItems($products, $cartItems)
    {
        return $products->map(function ($product) use ($cartItems) {
            $quantity = $cartItems[$product->id]['quantity'];
            $totalItemPrice = $this->cartService->calculateItemPrice($product->catalogue_price, $quantity);

            return [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'total' => $totalItemPrice,
            ];
        })->toArray();
    }
}
