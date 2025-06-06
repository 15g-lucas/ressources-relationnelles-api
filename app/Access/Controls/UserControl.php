<?php

namespace App\Access\Controls;

use App\Access\Perimeters\TestPerimeter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Lomkit\Access\Controls\Control;

class UserControl extends Control
{
    protected function perimeters(): array
    {
        return [
            TestPerimeter::new()
                ->allowed(function (Model $user, string $method) {
                    return false;
                })
                ->should(function (Model $user, Model $model) {
                    return false;
                })
                ->query(function (Builder $query, Model $user) {
                    return $query;
                }),
        ];
    }
}
