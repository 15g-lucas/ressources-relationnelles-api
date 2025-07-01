<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function exploited_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'exploited')
        ->withTimestamps();
    }

    public function consulted_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'consultations')
        ->withTimestamps();
    }

    public function saved_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'saved')
        ->withTimestamps();
    }

    public function favorite_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'favorites')
        ->withTimestamps();
    }

    public function shared_posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'shared')
        ->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
