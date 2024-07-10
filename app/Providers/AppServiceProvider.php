<?php

namespace App\Providers;

use App\Services\CartService;
use App\Services\OrderService;
use App\Services\PaymentService;
use App\Services\NotificationService;
use App\Services\OrderProcessorService;
use Illuminate\Support\ServiceProvider;
use App\Services\PriceCalculatorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CartService::class, function ($app) {
            return new CartService();
        });
        $this->app->singleton(OrderService::class, function ($app) {
            return new OrderService();
        });
        $this->app->singleton(PaymentService::class, function ($app) {
            return new PaymentService();
        });

        $this->app->singleton(PriceCalculatorService::class, function ($app) {
            return new PriceCalculatorService();
        });

        $this->app->singleton(OrderProcessorService::class, function ($app) {
            return new OrderProcessorService(
                $app->make(OrderService::class),
                $app->make(PaymentService::class),
                $app->make(PriceCalculatorService::class)
            );
        });
        $this->app->singleton('notification-service', function ($app) {
            return new NotificationService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
