<?php

namespace App\Contracts;

use App\Models\Order;
use App\Enums\PaymentType;

interface PaymentServiceContract
{
    public function createPayment(Order $order, PaymentType $paymentType, float $total);
}
