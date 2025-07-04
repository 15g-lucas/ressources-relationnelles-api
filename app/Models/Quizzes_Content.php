<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quizzes_Content extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'question',
        'response_1',
        'response_2',
        'response_3',
        'response_4',
        'good_response'
    ];

    public function quiz(): BelongsTo 
    {
        return $this->belongsTo(Quiz::class);
    }
}
