<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Superheros;
use App\Features;
use App\Publishers;
use App\Races;
use Excel;
use App\Service;
use App\Imports\SuperherosImport;

class SuperherosController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $fullName = $request->get('fullName');
       $publisher = $request->get('publisher');
       $race = $request->get('race');
       $order = ($request->get('order') == 'fullName') ? $request->get('order') : 'id' ;

        // filtra por fullName,publisher o race
       $superheros=Superheros::with('features','features.races', 'publishers')
                    ->fullName($fullName)
                    ->whereHas('publishers',function($q) use ($publisher){$q->publisher($publisher);})
                    ->whereHas('features.races',function($q) use ($race){$q->race($race);})
                    ->orderBy($order)
                    ->paginate();

       return  $superheros;

    }

    public function import() 
    {

        Excel::import(new SuperherosImport, public_path('../../csv/superheros.csv'));


        echo  'Superheros import successfull';

        return;
    }
}
