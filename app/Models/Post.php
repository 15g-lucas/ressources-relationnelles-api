<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'text',
        'url',
        'visibility',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'visibility' => 'string',
    ];

        /**
     * Scope a query to only include posts visible to the given user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisibleTo($query, User $user)
    {
        // Public posts
        $query->where('visibility', 'public');

        // Posts by friends, family, colleagues
        $relationTypes = ['friends', 'family', 'colleagues'];
        $query->orWhere(function ($q) use ($user, $relationTypes) {
            $q->whereIn('visibility', $relationTypes)
              ->whereHas('user', function ($q2) use ($user, $relationTypes) {
                  $q2->whereHas('relations', function ($q3) use ($user, $relationTypes) {
                      $q3->where('user2_id', $user->id)
                          ->whereIn('type', $relationTypes)
                          ->where('state', 'accepted');
                  })
                  ->orWhereHas('related_to_me', function ($q3) use ($user, $relationTypes) {
                      $q3->where('user1_id', $user->id)
                          ->whereIn('type', $relationTypes)
                          ->where('state', 'accepted');
                  });
              });
        });

        return $query;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user_exploited(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'exploited')
        ->withTimestamps();
    }

    public function user_consulted(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'consultations')
        ->withTimestamps();
    }

    public function user_saved(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved')
        ->withTimestamps();
    }

    public function user_added_to_favorites(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites')
        ->withTimestamps();
    }

    public function user_shared(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'shared')
        ->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    
}
