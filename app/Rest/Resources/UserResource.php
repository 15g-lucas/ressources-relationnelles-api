<?php

namespace App\Rest\Resources;

use App\Models\User;
use App\Rest\Resource as RestResource;
use Illuminate\Database\Eloquent\Model;
use Lomkit\Rest\Http\Requests\RestRequest;
use Lomkit\Rest\Relations\BelongsToMany;
use Lomkit\Rest\Relations\HasMany;

class UserResource extends RestResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<Model>
     */
    public static $model = User::class;

    /**
     * The default value for the pagination limit.
     *
     * @var int
     */
    public int $defaultLimit = 50;

    /**
     * The exposed fields that could be provided.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function fields(RestRequest $request): array
    {
        return [
            'id',
            'username',
            'firstname',
            'lastname',
            'date_of_birth',
            'profile_picture',
            'phone',
            'city',
            'zip_code',
        ];
    }

    /**
     * The exposed relations that could be provided.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function relations(RestRequest $request): array
    {
        return [
            HasMany::make('posts', PostResource::class),
            BelongsToMany::make('exploited_posts', PostResource::class),
        ];
    }

    /**
     * The exposed scopes that could be provided.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function scopes(RestRequest $request): array
    {
        return [];
    }

    /**
     * The exposed limits that could be provided.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function limits(RestRequest $request): array
    {
        return [
            10,
            25,
            50,
        ];
    }

    /**
     * The actions that should be linked.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function actions(RestRequest $request): array
    {
        return [];
    }

    /**
     * The instructions that should be linked.
     *
     * @param RestRequest $request
     *
     * @return array
     */
    public function instructions(RestRequest $request): array
    {
        return [];
    }
}
