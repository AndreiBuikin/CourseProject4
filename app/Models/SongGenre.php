<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'genre_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
