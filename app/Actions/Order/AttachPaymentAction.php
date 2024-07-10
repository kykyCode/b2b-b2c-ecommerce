<?php

namespace App\Actions\Order;

use Closure;
use App\Models\Order;
use App\Services\Payment\PaymentServiceFactory;
use App\Enums\PaymentType;
use Exception;


class AttachPaymentAction
{
    protected $paymentMethodKey;

    public function __construct(string $paymentMethodKey)
    {
        $this->paymentMethodKey = $paymentMethodKey;
    }

    public function handle(Order $order, Closure $next)
    {
        try {
            $paymentServiceFactory = app(PaymentServiceFactory::class);
            $paymentType = PaymentType::from($this->paymentMethodKey);
            $paymentService = $paymentServiceFactory->getPaymentService($paymentType);
            $paymentService->createPayment($order, $paymentType, $order->total);
        } catch (Exception $e) {
            throw new Exception("Payment processing failed: " . $e->getMessage());
        }

        return $next($order);
    }
}
