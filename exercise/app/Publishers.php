<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publishers extends Model
{
	protected $table = 'publishers';
    protected $fillable = ['publisher'];
	protected $hidden = ['created_at','updated_at'];


    public function scopePublisher($query, $publisher)
    {
    	if($publisher)
    		return $query->where('publisher', 'LIKE', "%$publisher%" );
    }


}
