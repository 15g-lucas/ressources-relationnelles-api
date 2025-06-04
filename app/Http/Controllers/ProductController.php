<?php

namespace App\Http\Controllers;

use App\Models\BillingProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Nexeren\NetboxSdk\Netbox;
use Nexeren\NetboxSdk\NetboxClient;
use Nexeren\Pricing\Pricing;

class ProductController extends Controller
{
    public function index()
    {
        dd(BillingProduct::all());
    }
}
