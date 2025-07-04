<?php

namespace App\Enums;

enum State: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Refused = 'refused';
}
