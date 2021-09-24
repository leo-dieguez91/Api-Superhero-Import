<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Races extends Model
{
	protected $table = 'races';
    protected $fillable = ['race'];
    protected $hidden = ['created_at','updated_at'];

    public function scopeRace($query, $race)
    {
    	if($race)
    		return $query->where('race', 'LIKE', "%$race%" );
    }

}


