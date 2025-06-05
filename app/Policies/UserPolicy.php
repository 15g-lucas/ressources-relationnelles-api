<?php

namespace App\Policies;

use App\Models\User;
use Lomkit\Access\Policies\ControlledPolicy;

class UserPolicy extends ControlledPolicy
{
    protected string $model = User::class;
}
