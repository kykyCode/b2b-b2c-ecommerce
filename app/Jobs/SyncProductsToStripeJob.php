<?php

namespace App\Jobs;

use App\Services\StripeSyncService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncProductsToStripeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 120;

    protected $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function handle(StripeSyncService $stripeService)
    {
        foreach ($this->products as $product) {
            $stripeService->syncProductToStripe($product);
        }
    }
}
