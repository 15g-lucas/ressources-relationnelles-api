<?php

namespace App\Rest\Controllers;

use App\Rest\Controller;
use App\Rest\Resources\PostResource;

class PostsController extends Controller
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = PostResource::class;
}
