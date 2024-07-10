<?php

namespace App\Services;

use App\Models\Order;
use App\Models\PaymentMethod;

class PaymentService
{
    public function createPayment(Order $order, string $paymentMethodKey, float $total)
    {
        $paymentMethod = PaymentMethod::where('key', $paymentMethodKey)->first();

        return $order->payment()->create([
            'payment_method_id' => $paymentMethod->id,
            'status' => 'unpaid',
            'total' => $total,
        ]);
    }
}
