<?php

namespace Nexeren\Pricing\Manager;

use Illuminate\Database\Eloquent\Model;
use Nexeren\Pricing\Contracts\Pricer;

class BillingProductPricer implements Pricer
{
    protected float $margin;

    public function __construct(array $config = [])
    {
        $this->margin = $config['margin'];
    }

    public function getPriceWithoutVat(Model $model): int
    {
        return (int) $model->price * (1 + $this->margin);
    }

    public function getVatAmount(Model $model): int
    {
        return $this->getPriceWithoutVat($model) * ($model->tva / 100);
    }

    public function getPriceWithVat(Model $model): int
    {
        return $this->getPriceWithoutVat($model) + $this->getVatAmount($model);
    }
}
