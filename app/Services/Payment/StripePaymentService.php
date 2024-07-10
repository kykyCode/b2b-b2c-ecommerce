<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Enums\PaymentType;
use App\Models\PaymentMethod;
use App\Contracts\PaymentServiceContract;
use Illuminate\Support\Facades\Log;
use Exception;

class StripePaymentService implements PaymentServiceContract
{
    protected $frontendUrl;

    public function __construct()
    {
        $this->frontendUrl = config('frontend.url');
    }

    public function createPayment(Order $order, PaymentType $paymentType, float $total)
    {
        try {
            $order->load('items.product');

            $paymentMethod = PaymentMethod::where('key', $paymentType->value)->first();

            $lineItems = [];
            foreach ($order->items as $item) {
                $lineItems[$item->product->stripe_price_id] = $item->quantity;
            }

            $checkoutSession = $order->user->checkout($lineItems, [
                'success_url' => route('stripe.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('stripe.cancel', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            ]);

            $order->payment()->create([
                'payment_method_id' => $paymentMethod->id,
                'total' => $total,
                'status' => 'waiting',
                'checkout_session_id' => $checkoutSession->id,
                'checkout_session_url' => $checkoutSession->url
            ]);
        } catch (Exception $error) {
            Log::channel('stripe')->error('Failed to create payment', [
                'order_id' => $order->id,
                'error_message' => $error->getMessage(),
                'stack_trace' => $error->getTraceAsString()
            ]);

            throw $error;
        }
    }
}
