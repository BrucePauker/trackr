<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'artist_id', 'path_image'
    ];


    /**
     * Return one to many relation with artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist() {
        return $this->belongsTo('\App\Models\Artist');
    }
}
