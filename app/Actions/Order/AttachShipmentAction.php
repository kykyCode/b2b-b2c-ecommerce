<?php

namespace App\Actions\Order;

use Closure;
use App\Models\Order;
use Exception;

class AttachShipmentAction
{
    protected $shipmentKey;

    public function __construct(string $shipmentKey)
    {
        $this->shipmentKey = $shipmentKey;
    }

    //TODO: real shipment model + UPS integration
    public function handle(Order $order, Closure $next)
    {
        try {
            if ($this->shipmentKey === 'delivery') {
                $order->total += 20;
            } elseif ($this->shipmentKey === 'personal_collection') {
                $order->total += 0;
            }

            $order->save();
        } catch (Exception $e) {
            throw new Exception("Shipment processing failed: " . $e->getMessage());
        }

        return $next($order);
    }
}
