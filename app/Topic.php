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

    protected $table = 'topics';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'name',
        'fields_id',
        'level_id',
        'expense',
        'over_view',
        'urgency',
        'goal',
        'own_user_id',
        'max_member',
        'method',
        'document_path',
        'img',
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
        return $this->belongsTo(Field::class, 'fields_id');
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
        return $this->belongsTo(User::class, 'own_user_id');
    }

    public function usertopics()
    {
        return $this->hasMany(UserTopic::class);
    }

    public function usertopicsProgress()
    {
        return $this->hasMany(UserTopic::class)->where('status', UserTopic::STATUS_PROGRESS);
    }

    public static function getPendingTopics()
    {
        $topics = Topic::where('status', Topic::STATUS_PENDING_ADMIN)->get();
        return $topics;
    }

        public function getStatusLabelAttribute()
    {   
        switch ($this->attributes['status']) {
            case self::STATUS_FINISH:
                return __('Finish');
                break;
            case self::STATUS_IN_PROGRESS:
                return __('Progress');
                break;
            case self::STATUS_PENDING_ADMIN:
                return __('Pending Admin');
                break;
            case self::STATUS_PENDING_USER:
                return __('Pending User');
                break;
        }
    }
}
