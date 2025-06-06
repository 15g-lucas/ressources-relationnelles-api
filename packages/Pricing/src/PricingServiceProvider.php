<?php

namespace Nexeren\Pricing;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Nexeren\Pricing\Manager\PricingManager;

class PricingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('pricing', function (Container $app) {
            return new PricingManager($app);
        });
    }
}
