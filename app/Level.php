<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	/**
     * Declare table
     *
     * @var string $tabel table name
     */
    protected $table = 'levels';
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'name'
    ];

    const PER_PAGE = 10;
}
