<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAcademicsRank extends Model
{
   /**
     * Declare table
     *
     * @var string $tabel table name
     */
    protected $table = 'user_academic_rank';
    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'user_id', 'academic_rank_id', 'graduate'
    ];

    /**
     * Relationship with academicsrank model
     *
     * @return \App\Model
     */
    public function academicsrank()
    {
        return $this->belongsTo(AcademicRank::class, 'academic_rank_id');
    }
}
