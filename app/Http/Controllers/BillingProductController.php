<?php

namespace App\Http\Controllers;

use App\Models\BillingProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingProductController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    public function index()
    {
        $user = Auth::user();
        $user->can('viewAny', BillingProduct::class);

        return BillingProduct::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BillingProduct $billingProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillingProduct $billingProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillingProduct $billingProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillingProduct $billingProduct)
    {
        //
    }
}
