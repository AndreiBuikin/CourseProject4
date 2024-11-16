<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongArtist extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
        'artist_id',
    ];

    public function song()
    {
        return $this->belongsTo(Song::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
