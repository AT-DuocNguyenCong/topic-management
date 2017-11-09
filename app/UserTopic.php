<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTopic extends Model
{

    const STATUS_PENDING = 0;
    const STATUS_PROGRESS = 1;

    protected $table = 'user_topic';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'topic_id',
        'status',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
