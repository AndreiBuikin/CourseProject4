<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'gender',
        'role_id',
        'api_token',
    ];

    protected $hidden = [
        'password',
        'api_token'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
