<?php

namespace App;

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
}
