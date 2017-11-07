<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_APPROVE = 1;

	/**
     * Declare table
     *
     * @var string $tabel table name
     */
    protected $table = 'messages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'sender_id', 'reciever_id', 'content', 'status'
    ];

    const PER_PAGE = 10;

    public function reciever()
    {
        return $this->belongsTo(User::class, 'reciever_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public static function getMessages($id)
    {
       $messages = Message::where([
            ['reciever_id', $id],
            ['status', Message::STATUS_PENDING],
        ])->get();
        return $messages;
    }


}
