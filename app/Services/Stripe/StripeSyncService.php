<?php

namespace App\Services;

use Stripe\Stripe;
use App\Models\Product;
use Stripe\Price as StripePrice;
use Illuminate\Support\Facades\Log;
use Stripe\Product as StripeProduct;

class StripeSyncService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function syncProductToStripe(Product $product)
    {
        $productName = $product->name['en'] ?? 'Unnamed Product';
        $productDescription = $product->desc['en'] ?? 'No description available';

        Log::channel('stripe')->info('Now processing product:', [
            'product_id' => $product->id,
            'product_name' => $productName,
        ]);

        try {
            $stripeProduct = StripeProduct::create([
                'name' => $productName,
                'description' => $productDescription,
                'metadata' => [
                    'local_product_id' => $product->id,
                ],
            ]);

            $stripePrice = StripePrice::create([
                'unit_amount' => $product->catalogue_price * 100,
                'currency' => 'usd',
                'product' => $stripeProduct->id,
            ]);

            $product->stripe_product_id = $stripeProduct->id;
            $product->stripe_price_id = $stripePrice->id;
            $product->save();

            return $stripeProduct;
        } catch (\Exception $e) {
            Log::channel('stripe')->error('Failed to sync product to Stripe', [
                'product_id' => $product->id,
                'error' => $e->getMessage(),
            ]);

            return $e->getMessage();
        }
    }
}
