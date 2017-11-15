<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'street', 'zipcode', 'city', 'country', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Return one to many relation with artist
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artist() {
        return $this->hasOne('\App\Models\Artist');
    }

    /**
     * Return one to many relation with buyer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyers() {
        return $this->hasOne('\App\Models\Buyer');
    }
}
