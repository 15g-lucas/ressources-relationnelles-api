<?php

namespace App\Models;

use App\Enums\State;
use App\Enums\Type;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Relation extends Pivot
{
    protected $casts = [
        'state' => State::class,
        'type'  => Type::class,
    ];
}
