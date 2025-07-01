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
