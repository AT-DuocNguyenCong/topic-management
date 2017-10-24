<?php

namespace App;

use App\Topic;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    CONST NOT_ADMIN = 'false';
    CONST IS_ADMIN = 'true';
    CONST ROLE_ADMIN = '1';
    CONST ROLE_USER = '0';

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
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
        'path',
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

    // /**
    //  * Relationship belongsTo with place
    //  *
    //  * @return array
    // */
    // public function topics()
    // {
    //     return $this->hasMany(Topic::class);
    // }
}
