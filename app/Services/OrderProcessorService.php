<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use App\Actions\Order\CreateOrderAction;
use App\Actions\Order\AttachPaymentAction;
use App\Actions\Order\AttachShipmentAction;
use App\Actions\Order\CalculateTotalAmountAction;
use App\Actions\Order\AttachCartItemsToOrderAction;
use App\Facades\NotificationFacade as Notification;

class OrderProcessorService
{
    public function processOrder(array $orderData): void
    {
        DB::beginTransaction();

        try {
            $order = CreateOrderAction::dispatchSync(
                $orderData['address'],
                $orderData['notes']
            );

            $order = app(Pipeline::class)
                ->send($order)
                ->through([
                    AttachCartItemsToOrderAction::class,
                    CalculateTotalAmountAction::class,
                    new AttachShipmentAction($orderData['shipping_method_key']),
                    new AttachPaymentAction($orderData['payment_method_key']),
                ])
                ->then(function ($order) {
                    CartService::clearCart();
                    Notification::orderCreatedNotification($order);
                    Notification::paymentStatusChangedNotification($order->payment);
                });

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
