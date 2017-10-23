<?php

namespace App;

use App\Field;
use App\Level;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	const STATUS_FINISH = 3;
    const STATUS_IN_PROGRESS = 2;
    const STATUS_PENDING_ADMIN = 0;
    const STATUS_PENDING_USER = 1;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'nam',
        'fields_id',
        'level_id',
        'expense',
        'over_view',
        'urgency',
        'goal',
        'own_user_id',
        'max_member',
        'jion_member',
        'method',
        'document_path',
        'status',
        'date_begin',
        'date_end',
    ];

    /**
     * Relationship belongsTo with field
     *
     * @return array
    */
    public function field()
    {
        // return $this->belongsTo(Field::class, 'fields_id');
        return $this->hasOne(Field::class, 'fields_id');
    }


    /**
     * Relationship belongsTo with place
     *
     * @return array
    */
    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    /**
     * Relationship belongsTo with place
     *
     * @return array
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
