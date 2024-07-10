<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Product;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->add($request->id, $request->quantity);

        return response()->json(['message' => 'Item added to cart successfully'], 200);
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $this->cartService->remove($request->product_id);

        return response()->json(['message' => 'Item removed from cart successfully'], 200);
    }

    public function changeItemQuantity(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->changeQuantity($request->product_id, $request->quantity);

        return response()->json(['message' => 'Item quantity updated successfully'], 200);
    }

    public function getCart()
    {
        $cartItems = $this->cartService->getCartItems();
        $productIds = array_keys($cartItems);

        $products = Product::whereIn('id', $productIds)->get();

        $items = $this->mapProductsToCartItems($products, $cartItems);

        $totalItemsPrice = $this->cartService->calculateTotalPriceFromItems($items);
        $totalPrice = $totalItemsPrice;

        $shipmentKey = $this->cartService->getShipmentKey();
        if ($shipmentKey === 'delivery') {
            $totalPrice += 20;
        }

        return response()->json([
            'items' => $items,
            'total' => $totalPrice,
            'total_items_price' => $totalItemsPrice,
            'payment_key' => $this->cartService->getPaymentKey(),
            'shipment_key' => $shipmentKey,
            'shipment_price' =>  $this->cartService->getShipmentPrice()
        ], 200);
    }


    public function setPaymentKey(Request $request)
    {
        $request->validate([
            'payment_key' => 'required|string',
        ]);

        $this->cartService->setPaymentKey($request->payment_key);

        return response()->json(['message' => 'Payment method set successfully'], 200);
    }

    public function setShipmentKey(Request $request)
    {
        $request->validate([
            'shipment_key' => 'required|string',
        ]);

        $this->cartService->setShipmentKey($request->shipment_key);

        return response()->json(['message' => 'Shipment method set successfully'], 200);
    }

    /**
     * Map products to cart items with their quantities and total prices.
     *
     * @param \Illuminate\Database\Eloquent\Collection $products
     * @param array $cartItems
     * @return array
     */
    private function mapProductsToCartItems($products, $cartItems)
    {
        return $products->map(function ($product) use ($cartItems) {
            $quantity = $cartItems[$product->id]['quantity'];
            $totalItemPrice = $this->cartService->calculateItemPrice($product->catalogue_price, $quantity);

            return [
                'product' => $product,
                'quantity' => $quantity,
                'total_item_price' => $totalItemPrice,
            ];
        })->toArray();
    }
}
