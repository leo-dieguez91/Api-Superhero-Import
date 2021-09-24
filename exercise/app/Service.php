<?php

namespace App;

use App\Races;
use App\Publishers;

class Service
{

    public function publisher($data)
    {
    	if(!$data)
    		return null;

		$publisher = Publishers::where('publisher', $data)->first();
		if ($publisher === null) {
			$publisher = new Publishers();
			$publisher->publisher=$data;
			$publisher->save();
		}

		return $publisher->id;
    }

    public function race($data)
    {

    	if(!$data)
    		return null;

		$race = Races::where('race', $data)->first();
		if ($race === null) {
			$race = new Races();
			$race->race=$data;
			$race->save();
		}

		return $race->id;
    }

    public function normalizeInt($data)
    {
    	if(!$data)
    		return null;

       $dataInt = abs(filter_var($data, FILTER_SANITIZE_NUMBER_INT));
       $dataInt = ($dataInt == 0) ? null : $dataInt;

       return $dataInt;
    }



}



