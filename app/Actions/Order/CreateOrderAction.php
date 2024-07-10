<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;

class CreateOrderAction
{
    use \Illuminate\Foundation\Bus\Dispatchable;

    public function __construct(
        public array $addressData,
        public string $notes,
    ) {}

    public function handle(): Order
    {
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => OrderStatus::PENDING,
            'notes' => $this->notes,
            'address_data' => $this->addressData,
        ]);

        if (!$order) {
            throw new \Exception('Unable to create the order.');
        }

        return $order;
    }
}
