<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'biography',
        'photo',
    ];

    public function songs()
    {
        return $this->belongsToMany(Song::class, 'songartists', 'artist_id', 'song_id');
    }
}

