<?php

namespace App\Access\Controls;

use App\Access\Perimeters\TestPerimeter;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Lomkit\Access\Controls\Control;
use Lomkit\Access\Perimeters\Perimeter;

class BillingProductControl extends Control
{
    /**
     * Retrieve the list of perimeter definitions for the current control.
     *
     * @return array<Perimeter> An array of Perimeter objects.
     */
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
