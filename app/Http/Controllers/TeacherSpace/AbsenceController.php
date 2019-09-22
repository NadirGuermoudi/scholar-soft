<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Absence;
use App\Models\Seance;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\Groupe;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct()
	{
		$this->middleware('enseignant');
	}

	public function ajaxRequestPost(Request $request)
	{

		$jour = $request->jour;
		$id = $request->id;

		$seances = Seance::where('jour', $jour)->where('enseignant_id',$id)->get();


		$json = json_encode($seances);

		return response()->json($json);

	}

	public function absence(Request $request)
	{

	}

	public function index()
	{
		$data = Auth::guard('enseignant')->user()->seances;
		$eId = Auth::guard('enseignant')->user()->id;

		$today = date('Y-m-d');

		return view('teacherSpace/fairelappel/index', compact('eId','data', 'today'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */


	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */

	public function store(Request $request)
	{
		$seance = Seance::where('id', $request->idSeance)->first();
		$etudiant = Etudiant::where('id', $request->idEtudiant)->first();
		$date = $request->input('date');
		$abs = $seance->absents()->find($etudiant->id);
		if (!empty($abs->pivot->date)) {
			if ($abs->pivot->date == $date) {

				if ($request->presence == 1) {
					$abs->pivot->presence = 1;
					$abs->pivot->save();
					return response()->json(['success' => 'present']);
				} else {
					$abs->pivot->presence = 0;
					$abs->pivot->save();
					return response()->json(['success' => 'absent']);
				}
			} else {
				if ($request->presence == 1) {
					$presence = 1;
					$seance->absents()->attach($etudiant, ['date' => $date, 'justified' => 0,
						'presence' => $presence]);
					return response()->json(['success' => 'present']);
				} else {
					$presence = 0;
					$seance->absents()->attach($etudiant, ['date' => $date, 'justified' => 0,
						'presence' => $presence]);
					return response()->json(['success' => 'absent']);
				}
			}
		} else {
			if ($request->presence == 1) {
				$presence = 1;
				$seance->absents()->attach($etudiant, ['date' => $date, 'justified' => 0,
					'presence' => $presence]);
				return response()->json(['success' => 'present']);
			} else {
				$presence = 0;
				$seance->absents()->attach($etudiant, ['date' => $date, 'justified' => 0,
					'presence' => $presence]);
				return response()->json(['success' => 'absent']);
			}


		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{

	}

	public function afficher(Request $request)
	{
		$id = (int)$request->seance;
		$groupe = Seance::where('id', $id)->first()->groupes;
		$today = $request->input('date');


		return view('teacherSpace/fairelappel/show', compact('groupe', 'id', 'today'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}


}
