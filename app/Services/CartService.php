<?php

namespace App\Services;

class CartService
{
    protected $sessionKey = 'cart';

    public function add(int $productId, int $quantity = 1)
    {
        $cart = $this->getCart();

        if (isset($cart['items'][$productId])) {
            $cart['items'][$productId]['quantity'] += $quantity;
        } else {
            $cart['items'][$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
            ];
        }

        $this->saveCart($cart);
    }

    public function remove(int $productId)
    {
        $cart = $this->getCart();

        if (isset($cart['items'][$productId])) {
            unset($cart['items'][$productId]);
            $this->saveCart($cart);
        }
    }

    public function changeQuantity(int $productId, int $quantity)
    {
        $cart = $this->getCart();

        if (isset($cart['items'][$productId])) {
            if ($quantity > 0) {
                $cart['items'][$productId]['quantity'] = $quantity;
            } else {
                unset($cart['items'][$productId]);
            }

            $this->saveCart($cart);
        }
    }

    public function getCartItems()
    {
        $cart = $this->getCart();
        return $cart['items'] ?? [];
    }

    public function calculateItemPrice(float $singlePrice, int $quantity): float
    {
        $totalPrice = $singlePrice * $quantity;
        return round($totalPrice, 2);
    }

    public function calculateTotalPriceFromItems(array $items): float
    {
        $totalPrice = array_sum(array_column($items, 'total_item_price'));
        return round($totalPrice, 2);
    }

    public function setPaymentKey(string $paymentKey)
    {
        $cart = $this->getCart();
        $cart['payment_key'] = $paymentKey;
        $this->saveCart($cart);
    }

    //TODO: refactor - use real model, real services and integrations for shipment
    public function setShipmentKey(string $shipmentKey)
    {
        $cart = $this->getCart();

        $cart['shipment_key'] = $shipmentKey;

        if ($shipmentKey === 'delivery') {
            $cart['total'] += 20;
            $cart['shipment_price'] = 20;
        } else {
            $cart['shipment_price'] = 0;
        }

        $this->saveCart($cart);
    }

    public function getPaymentKey(): ?string
    {
        $cart = $this->getCart();
        return $cart['payment_key'] ?? null;
    }

    public function getShipmentKey(): ?string
    {
        $cart = $this->getCart();
        return $cart['shipment_key'] ?? null;
    }

    public function getShipmentPrice()
    {
        if ($this->getShipmentKey() == 'delivery') {
            return 20;
        }
        return 0;
    }

    protected function getCart()
    {
        return session()->get($this->sessionKey, [
            'items' => [],
            'total' => 0,
            'payment_key' => null,
            'shipment_key' => null,
        ]);
    }

    protected function saveCart(array $cart)
    {
        session()->put($this->sessionKey, $cart);
    }

    public static function clearCart(): void
    {
        session()->forget('cart');
    }
}
