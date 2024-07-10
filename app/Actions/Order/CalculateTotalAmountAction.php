<?php

namespace App\Actions\Order;

use Closure;
use App\Models\Order;

class CalculateTotalAmountAction
{
    public function handle(Order $order, Closure $next)
    {
        $order->load('items');

        if ($order->items->isEmpty()) {
            throw new \Exception('No items found for total calculation.');
        }

        $totalAmount = $order->items->sum('total');

        $order->update(['total' => $totalAmount]);

        return $next($order);
    }
}
