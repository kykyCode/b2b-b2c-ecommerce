<?php

namespace App\Http\Controllers\Stripe;

use Exception;
use Stripe\Stripe;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\Exception\AuthenticationException;
use App\Facades\NotificationFacade as Notification;

class StripeController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if (!$session) {
                throw new Exception('Cannot find session');
            }

            $payment = Payment::where('checkout_session_id', $sessionId)->first();

            if (!$payment) {
                throw new Exception('Cannot find payment');
            }

            $payment->update(['paid' => true, 'status' => 'paid']);

            Notification::paymentStatusChangedNotification($payment);

            $clientUrl = config('client.url');
            $redirectUrl = $clientUrl . '/dashboard/orders';

            return redirect($redirectUrl);
        } catch (AuthenticationException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function cancel(Request $request)
    {
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if (!$session) {
                throw new Exception('Cannot find session');
            }

            $payment = Payment::where('checkout_session_id', $sessionId)->first();

            if (!$payment) {
                throw new Exception('Cannot find payment');
            }

            $payment->update(['paid' => false, 'status' => 'canceled']);
            $payment->order->update(['status' => 'hold']);

            Notification::orderStatusChangedNotification($payment->order);
            Notification::paymentStatusChangedNotification($payment);

            $clientUrl = config('client.url');
            $redirectUrl = $clientUrl . '/dashboard/orders';

            return redirect($redirectUrl);
        } catch (AuthenticationException $e) {
            throw $e;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
