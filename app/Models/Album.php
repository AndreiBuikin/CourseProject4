<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'release_year',
        'studio_id',
    ];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
