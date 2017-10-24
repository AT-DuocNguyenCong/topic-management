<?php

namespace App;

use App\User;
use App\UserAcademicsRank;
use Illuminate\Database\Eloquent\Model;

class AcademicRank extends Model
{
	/**
     * Declare table
     *
     * @var string $tabel table name
     */
    protected $table = 'academic_rank';
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

     /**
     * Get hotel service for service
     *
     * @return array
     */
    public function userAcademicsrank()
    {
        return $this->hasMany(UserAcademicsRank::class);
    }
}
