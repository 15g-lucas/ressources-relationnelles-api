<?php

namespace Nexeren\Pricing;

use Illuminate\Support\Facades\Facade;

class Pricing extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'pricing';
    }
}
