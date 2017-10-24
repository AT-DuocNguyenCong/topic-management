<?php

namespace App;

use App\AcademicRank;
use App\UserAcademicsRank;
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

    public function academicsrank()
    {
        return $this->belongsToMany(AcademicRank::class);
    }

    /**
     * Get academics  rank
     *
     * @return array
     */
    public function userAcademicsrank()
    {
        return $this->hasMany(UserAcademicsRank::class);
    }

     /**
     * Get hotel service for service
     *
     * @return array
     */
    public function messageSend()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

     /**
     * Get hotel service for service
     *
     * @return array
     */
    public function messageRecieve()
    {
        return $this->hasMany(Message::class, 'reciever_id');
    }
}
