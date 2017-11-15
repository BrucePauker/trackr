<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'biography', 'name_artist', 'user_id'
    ];


    /**
     * Return one to many relation with user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

    /**
     * Return all the art work of a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artworks()
    {
        return $this->hasMany('\App\Models\Artwork');
    }
}
