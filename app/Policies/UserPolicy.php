<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Lomkit\Access\Policies\ControlledPolicy;

class UserPolicy extends ControlledPolicy
{
    protected string $model = User::class;
}
