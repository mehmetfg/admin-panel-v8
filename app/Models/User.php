<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name',
        'type',
        'defination',
        'password',
        'email',
        'phone1',
        'phone2',
        'address',
        'web',
        'twitter',
        'youtube',
        'instagram',
        'linkedin',
        'google',
        'facebook',
        'aboutUs',
        'map',
        'logo',
        'meta_keyword',
        'meta_description',


    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}
