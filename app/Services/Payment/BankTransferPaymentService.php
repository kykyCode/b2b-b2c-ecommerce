<?php

namespace App\Services\Payment;

use App\Contracts\PaymentServiceContract;
use App\Enums\PaymentType;
use App\Models\Order;
use App\Models\PaymentMethod;

class BankTransferPaymentService implements PaymentServiceContract
{
    public function createPayment(Order $order, PaymentType $paymentType, float $total)
    {
        return $order->payment()->create([
            'payment_method_id' => PaymentMethod::where('key', $paymentType->value)->first()->id,
            'total' => $total,
            'status' => 'pending',
        ]);
    }
}
