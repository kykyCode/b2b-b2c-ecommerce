<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class TrackLastViewedProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route('product')) {
            $productId = $request->route('product')->id;
            $this->addToLastViewedProducts($productId);
        }

        return $next($request);
    }

    /**
     * Add a product ID to the last viewed products in the session.
     *
     * @param  int  $productId
     * @return void
     */
    protected function addToLastViewedProducts($productId)
    {
        $lastViewed = Session::get('last_viewed_products', []);

        if (($key = array_search($productId, $lastViewed)) !== false) {
            unset($lastViewed[$key]);
        }

        array_unshift($lastViewed, $productId);

        if (count($lastViewed) > 30) {
            array_pop($lastViewed);
        }

        Session::put('last_viewed_products', $lastViewed);
    }
}
