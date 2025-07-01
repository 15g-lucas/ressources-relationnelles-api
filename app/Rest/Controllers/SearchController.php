<?php

namespace App\Rest\Controllers;

use App\Rest\Controller;
use App\Rest\Resources\SearchResource;

class SearchController extends Controller
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = SearchResource::class;
}
