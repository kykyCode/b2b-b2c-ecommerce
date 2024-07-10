<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    public function createOrder(array $orderData): Order
    {
        return Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);
    }

    public function attachItems(Order $order, array $items)
    {
        $order->items()->createMany($items);
    }
}
