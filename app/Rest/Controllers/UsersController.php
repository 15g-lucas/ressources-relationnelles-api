<?php

namespace App\Rest\Controllers;

use App\Rest\Controller as RestController;
use App\Rest\Resources\UserResource;

class UsersController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<resource>
     */
    public static $resource = UserResource::class;
}
