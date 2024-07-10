<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;

class NotificationService
{
    public function orderCreatedNotification(Order $order)
    {
        $order->user->notifications()->create([
            'title' => $this->generateOrderTitle($order),
            'content' => $this->generateOrderContent($order)
        ]);
    }

    public function paymentStatusChangedNotification(Payment $payment)
    {
        $payment->order->user->notifications()->create([
            'title' => $this->generatePaymentTitle($payment),
            'content' => $this->generatePaymentContent($payment)
        ]);
    }

    public function orderStatusChangedNotification(Order $order)
    {
        $order->user->notifications()->create([
            'title' => $this->generateOrderStatusTitle($order),
            'content' => $this->generateOrderStatusContent($order)
        ]);
    }

    protected function generateOrderTitle(Order $order)
    {
        return "Order #BTC-{$order->id} Created Successfully";
    }

    protected function generateOrderContent(Order $order)
    {
        return "Hello {$order->user->first_name},\n\nThank you for placing your order with us! We are delighted to inform you that your order #{$order->id} has been successfully created and is now being processed. Our dedicated team is already hard at work to ensure that every detail of your order meets our high standards. You can rest assured that we will handle everything with the utmost care and precision. We understand how important this purchase is to you, and we're committed to keeping you informed every step of the way. Please keep an eye on your notifications for any important updates regarding your order status, shipping details, and more. If you have any questions or need further assistance, do not hesitate to reach out to our customer support team, who are always ready to help.";
    }

    protected function generatePaymentTitle(Payment $payment)
    {
        return "Payment Status Updated for Order #BTC-{$payment->order->id}";
    }

    protected function generatePaymentContent(Payment $payment)
    {
        return "Dear {$payment->order->user->first_name},\n\nWe wanted to notify you that the status of your payment #{$payment->id} has been updated to {$payment->status} in our system. Keeping track of your payments is crucial, and we want to ensure that you are always up-to-date with the latest information. Whether this update reflects a successful transaction, a pending process, or any other status change, we encourage you to log in to your account to review the details. Understanding your payment status helps you stay on top of your financial activities, and we're here to make that as seamless as possible. If you have any concerns or notice anything unusual, please feel free to contact us immediately so we can address any issues promptly. Thank you for your continued trust in our services, and we look forward to serving you with the highest level of excellence.";
    }

    protected function generateOrderStatusTitle(Order $order)
    {
        return "Order #BTC-{$order->id} Status Has Been Updated";
    }

    protected function generateOrderStatusContent(Order $order)
    {
        return "Hello {$order->user->first_name},\n\nWe wanted to let you know that the status of your order #BTC-{$order->id} has been updated to '{$order->status}'. This change reflects the current state of your order, and our team is diligently working to ensure that everything is proceeding smoothly. Please check your account for further details or any additional actions that may be required on your part. We appreciate your patience and understanding as we work to provide the best possible service. If you have any questions, please don't hesitate to reach out to our customer support.";
    }
}
