<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function quizzes_content(): HasMany
    {
        return $this->hasMany(Quizzes_Content::class);
    }

    public function users_played(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'games_activity')
        ->withTimestamps();
    }
}
