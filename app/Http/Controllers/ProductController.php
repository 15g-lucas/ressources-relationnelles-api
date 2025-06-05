<?php

namespace App\Http\Controllers;

use App\Models\BillingProduct;

class ProductController extends Controller
{
    public function index()
    {
        dd(BillingProduct::all());
    }
}
