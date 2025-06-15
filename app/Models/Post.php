<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // TODO: visibility

    protected $fillable = [
        'text',
        'url',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
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
}
