<?php

namespace App\Services;

use Illuminate\Support\Facades\Session;
use App\Models\Product;

class LastViewedProductsService
{
    /**
     * Get the last viewed products from the session.
     *
     * @param int|null $limit The number of products to return. If null, return all.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLastViewedProducts(int $limit = null)
    {
        $lastViewed = Session::get('last_viewed_products', []);

        $query = Product::whereIn('id', $lastViewed);

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }
}
