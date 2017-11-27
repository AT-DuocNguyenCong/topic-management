<?php

namespace App;

use App\Town;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'devvn_quanhuyen';

    protected $fillable = ['maqh', 'name', 'type', 'matp'];

    public function towns()
    {
    	return $this->hasMany(Town::class, 'maqh');
    }
}
