<?php

namespace App\Policies;

use App\Models\BillingProduct;
use Lomkit\Access\Policies\ControlledPolicy;

class BillingProductPolicy extends ControlledPolicy
{
    protected string $model = BillingProduct::class;
}
