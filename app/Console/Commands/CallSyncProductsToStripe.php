<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Jobs\SyncProductsToStripeJob;

class CallSyncProductsToStripe extends Command
{
    protected $signature = 'stripe:sync-products';
    protected $description = 'Sync products to Stripe';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Product::chunk(30, function ($products) {
            SyncProductsToStripeJob::dispatch($products);
        });

        $this->info('Products sync has been queued successfully.');
    }
}
