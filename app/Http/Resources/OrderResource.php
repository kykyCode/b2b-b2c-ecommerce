<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'items' => $this->whenLoaded('items'),
            'payment' => $this->whenLoaded('payment', function () {
                return array_merge($this->payment->toArray(), [
                    'paymentMethod' => $this->whenLoaded('paymentMethod')
                ]);
            }),
            'user' => $this->whenLoaded('user'),
        ]);
    }
}
