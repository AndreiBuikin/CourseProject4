<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release_year',
        'duration',
        'album_id',
        'studio_id',
        'agerating_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

    public function agerating()
    {
        return $this->belongsTo(AgeRating::class);
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'songartists', 'song_id', 'artist_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'songgenres', 'song_id', 'genre_id');
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
