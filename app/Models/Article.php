<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Article extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'article';
    protected $fillable = [
        'title',
        // 'metadata',
        // 'category',
        'body',
        'slug',
        'image',
    ];

    protected function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
