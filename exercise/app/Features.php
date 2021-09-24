<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
	protected $table = 'features';
    protected $fillable = ['superhero_id', 'strength', 'speed', 'email', 'durability', 'power','combat', 'height_in', 'height_cm', 'weight_lb', 'weight_kg','eye_color','hair_color','race_id'];
	protected $hidden = ['created_at','updated_at'];

    public function superheros()
    {
        return $this->belongsTo('App\Superheros');
    }

	public function Races()
	{
	   return $this->belongsTo('App\Races','race_id');
	}


}
