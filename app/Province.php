<?php

namespace App;

use App\District;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'devvn_tinhthanhpho';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['matp', 'name', 'type'];

    public function districts()
    {
    	return $this->hasMany(District::class, 'matp');
    }
}
