<?php

namespace App\Services\Payment;

use InvalidArgumentException;
use App\Contracts\PaymentServiceContract;
use App\Services\Payment\StripePaymentService;
use App\Enums\PaymentType;
use App\Services\Payment\BankTransferPaymentService;

class PaymentServiceFactory
{
    public function getPaymentService(PaymentType $paymentMethod): PaymentServiceContract
    {
        return match ($paymentMethod) {
            PaymentType::BankTransfer => app(BankTransferPaymentService::class),
            PaymentType::Stripe => app(StripePaymentService::class),
            default => throw new InvalidArgumentException("Unsupported payment method: {$paymentMethod->value}"),
        };
    }
}
