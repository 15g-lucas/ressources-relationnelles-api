<?php

namespace Nexeren\NetboxSdk;

use Illuminate\Support\Facades\Facade;

class Netbox extends Facade
{
    protected static function getFacadeAccessor()
    {
        return NetboxClient::class;
    }
}
