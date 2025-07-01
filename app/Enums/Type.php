<?php

namespace App\Enums;

enum Type: string
{
    case Family = 'family';
    case Friend = 'friend';
    case Colleague = 'colleague';
    case Other = 'other';
}
