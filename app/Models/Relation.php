<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Enums\State;
use App\Enums\Type;

class Relation extends Pivot
{
    protected $casts = [
        'state' => State::class,
        'type'  => Type::class,
    ];
}
