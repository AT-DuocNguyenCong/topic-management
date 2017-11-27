<?php

namespace App;

use App\District;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'devvn_xaphuongthitran';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['xaid', 'name', 'type', 'maqh'];

    public function district()
    {
    	return $this->belongsTo(District::class, 'maqh');
    }
}
