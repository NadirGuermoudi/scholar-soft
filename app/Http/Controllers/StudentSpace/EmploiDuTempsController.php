<?php

namespace App\Http\Controllers\StudentSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Auth;

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

		// $groupe = App\Models\Etudiant::all()->orderBy('heur_debut','asc');

		$groupes = Etudiant::find(Auth::guard('etudiant')->user()->id)
								   ->groupes()
								   ->get();

		/* the next code, I use first() but I need to remove it to get all groups */
		$seances = Etudiant::find(Auth::guard('etudiant')->user()->id)
								   ->groupes()
								   ->first()
								   ->seances()
								   ->orderBy('heur_debut', 'asc')
								   ->get();


		/* Hashmap, to organize seances by days */
		$days = array (
			'DIMANCHE' => array(),
			'LUNDI' => array(),
			'MARDI' => array(),
			'MERCREDI' => array(),
			'JEUDI' => array(),
			'VENDREDI' => array(),
			'SAMEDI' => array()
			);

		/* counting number of seances of the most charged day */
	   


	   /* foreach($groupes as $groupe)
		{*/
			foreach($seances as $seance)
			{
				switch($seance->jour)
				{
					case "DIMANCHE":
						array_push($days['DIMANCHE'],$seance);
						break;
					case "LUNDI":
						array_push($days['LUNDI'],$seance);
						break;
					case "MARDI":
						array_push($days['MARDI'],$seance);
						break;
					case "MERCREDI":
						array_push($days['MERCREDI'],$seance);
						break;
					case "JEUDI":
						array_push($days['JEUDI'],$seance);
						break;
					case "VENDREDI":
						array_push($days['VENDREDI'],$seance);
						break;
					case "SAMEDI":
						array_push($days['SAMEDI'],$seance);
						break;
				}

			}


			// $length=0;
			// $chargedDay=0;

			// foreach($days as $day=>$mySeances)
			// {
			//     foreach($mySeances as $mySeance)
			//     {
			//         if($mySeance->heur_debut==next($mySeance)->heur_debut)
			//         {
			//             I'm warrying if the student is in L1 year, and belongs to G2
			//             and the same houre the G1 and G2 and G3 have courses, is this code gonna resolve the problem ? 
						
			//             $length--;                
			//         }
			//         $length++;
			//     }
			//     dd($length);

			//     if($chargedDay<$length)
			//     {
			//         $chargedDay=$length;
			//     }
			// }

			// dd($chargedDay);

		// }


		return view('studentSpace/emploiDuTemps/index2', compact('days','groupes','chargedDay'));

	}

}
