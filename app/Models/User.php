<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Article;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // HasFactory digunakan untuk seeder Database
    // Notifiable digunakan untuk mengisi Notifikasi
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    // Melindungi data ketika dalam state fill dari SQl injection
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    // Protected hidden memiliki otomisasi untuk enkripsi
    // jadi jangan gunakan enkripsi di controller
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
//            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function articles(): HasMany {
        return $this->hasMany(Article::class);
    }
}
