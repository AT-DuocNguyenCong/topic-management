<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	/**
     * Declare table
     *
     * @var string $tabel table name
     */
    protected $table = 'fields';
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name'
    ];

    const PER_PAGE = 10;

    public function topics()
    {
        return $this->hasMany(Topic::class, 'fields_id');
    }
    public function topicLimit()
    {
        return $this->hasMany(Topic::class, 'fields_id')->limit(3);
    }
}
