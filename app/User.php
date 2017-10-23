<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    CONST NOT_ADMIN = 'false';
    CONST IS_ADMIN = 'true';
    CONST ROLE_ADMIN = '1';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'phone',
        'faculty',
        'major',
        'password',
        'is_admin',
        'hometown',
        'place_of_birth',
        'birthday',
        'company',
        'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
