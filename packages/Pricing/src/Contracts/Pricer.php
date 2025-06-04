<?php

namespace Nexeren\Pricing\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Pricer
{
    public function getPriceWithoutVat(Model $model): int;
    public function getVatAmount(Model $model): int;
    public function getPriceWithVat(Model $model): int;
}
