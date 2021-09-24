<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superheros extends Model
{
	protected $table = 'superheros';
    protected $fillable = [
    	'name', 'fullName', 'publisher_id'
	];
	protected $hidden = ['created_at','updated_at'];


	 public function Publishers()
	 {
	    return $this->belongsTo('App\Publishers','publisher_id');
	 }

    public function features()
    {
        return $this->hasOne('App\Features','superhero_id');
    }

    public function scopeFullName($query, $fullName)
    {
    	if($fullName)
    		return $query->where('superheros.fullName', 'LIKE', "%$fullName%" );
    }


}
