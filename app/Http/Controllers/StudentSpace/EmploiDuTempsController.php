<?php

namespace App\Http\Controllers\StudentSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmploiDuTempsController extends Controller
{

	public function __construct()
	{
	    $this->middleware('etudiant');
	}

    public function index()
    {

    /* 					Missing: filtering Seances by group of studentSpace 		*/

    	/* Selecting all seances, ordered by hour of seance starting */
    	$seances = App\Models\Seance::all()->orderBy('heur_debut','asc');

    	// /* Hashmap, to organize seances by days */
    	// $jours = array (
    	//     'DIMANCHE' => new array(),
    	//     'LUNDI' => new array(),
    	//     'MARDI' => new array(),
    	//     'MERCREDI' => new array(),
    	// 	'JEUDI' => new array(),
    	// 	'VENDREDI' => new array(),
    	// 	'SAMEDI' => new array()
    	// 	);
    

    	// /* foreach to stock a seance in its proper day */
    	// foreach ($seances as $seance) {
    	    
    	// 	switch ($seance->jour) {
    	// 	    case "DIMANCHE":
    	// 	        echo "i égal 0";
    	// 	        break;
    	// 	    case "LUNDI":
    	// 	        echo "i égal 1";
    	// 	        break;
    	// 	    case "MARDI":
    	// 	        echo "i égal 2";
    	// 	        break;
    	// 	    case "MERCREDI":
    	// 	        echo "i égal 2";
    	// 	        break;
    	// 	    case "JEUDI":
    	// 	        echo "i égal 2";
    	// 	        break;
    	// 	}

    	// }

        return view('studentSpace/emploiDuTemps/index');
    }

}
