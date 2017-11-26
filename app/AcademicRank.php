<?php

namespace App;

use App\User;
use App\UserAcademicsRank;
use Illuminate\Database\Eloquent\Model;

class AcademicRank extends Model
{

    const DEGREE = 1;
    const ACADEMICRANK =2;

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
        'name', 'description', 'type'
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

    public function getTypeLabelAttribute()
    {   
        switch ($this->attributes['type']) {
            case self::ACADEMICRANK:
                return __('AcademicRank');
                break;
            case self::DEGREE:
                return __('Degree');
                break;
        }
    }
}
