<?php

namespace Nexeren\NetboxSdk;

use Illuminate\Support\Facades\Http;

class NetboxClient
{
    public function __construct(
        protected string $baseUrl,
        protected string $token
    ) {}

    protected function request(string $method, string $path, array $params = [])
    {
        $response = Http::withToken($this->token)
            ->acceptJson()
            ->{$method}($this->baseUrl.$path, $params);

        return $response->json();
    }

    public function getProducts()
    {
        return $this->request('GET', '/products');
    }

    public function getCarts()
    {
        return $this->request('GET', '/carts');
    }

    public function getUsers()
    {
        return $this->request('GET', '/users');
    }
}
