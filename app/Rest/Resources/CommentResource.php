<?php

namespace App\Rest\Resources;

use App\Models\Comment;
use App\Rest\Resource;
use Lomkit\Rest\Http\Requests\RestRequest;
use Lomkit\Rest\Relations\BelongsTo;
use Lomkit\Rest\Relations\HasMany;

class CommentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    public static $model = Comment::class;

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
            'comment',
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
            BelongsTo::make('user', UserResource::class),
            BelongsTo::make('post', PostResource::class),
            BelongsTo::make('comment', CommentResource::class),
            HasMany::make('child_comments', CommentResource::class),
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
