<?php

namespace Nexeren\Pricing\Manager;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Manager;
use Nexeren\Pricing\Contracts\Pricer;

class PricingManager extends Manager implements Pricer
{
    public function getDefaultDriver(): string
    {
        return config('app.xefi_type');
    }

    protected function getDriverForModel(Model $model): BillingProductPricer
    {
        return $this->driver($model->driver);
    }

    public function getPriceWithoutVat(Model $model): int
    {
        return $this->getDriverForModel($model)->getPriceWithoutVat($model);
    }

    public function getVatAmount(Model $model): int
    {
        return $this->getDriverForModel($model)->getVatAmount($model);
    }

    public function getPriceWithVat(Model $model): int
    {
        return $this->getDriverForModel($model)->getPriceWithVat($model);
    }

    public function createAgencyDriver(): BillingProductPricer
    {
        return new BillingProductPricer([
            'margin' => 0.10,
        ]);
    }

    public function createFranchiseDriver(): BillingProductPricer
    {
        return new BillingProductPricer([
            'margin' => 0.15,
        ]);
    }
}
