<?php

namespace Nexeren\NetboxSdk;

use Illuminate\Support\ServiceProvider;

class NetboxSdkServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(NetboxClient::class, function () {
            return new NetboxClient(
                baseUrl: env('NETBOX_URL'),
                token: env('NETBOX_TOKEN')
            );
        });
    }
}
