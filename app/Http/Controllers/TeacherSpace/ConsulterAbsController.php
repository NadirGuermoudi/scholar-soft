<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Absence;
use App\Models\Seance;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConsulterAbsController extends Controller
{
	use UploadTrait;

	public function __construct()
	{
		$this->middleware('enseignant');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Auth::guard('enseignant')->user()->seances;
		$eId = Auth::guard('enseignant')->user()->id;

		return view('teacherSpace/consulterAbs/index', compact('eId', 'data'));
	}

	public function afficherAbs(Request $request)
	{
		$id = (int)$request->seance;
		$abs = Absence::where('seance_id', $id)
			->where('presence', 0)
			->get();
//		dd($abs->first()->date);
		$type = Seance::where('id', $id)->first()->type;
		$groupes = Seance::where('id', $id)->first()->groupes;


		return view('teacherSpace/consulterAbs/show', compact('groupes', 'abs', 'type'));
	}

	public function suppJus(Request $request){
		$idS = (int)$request->input('idS');


		$idE = (int)$request->input('idE');
		$date = $request->input('date');

		$seance = Seance::where('id', $idS)->first();
		$abss = $seance->absents()->where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();

			$abss->pivot->justification = null;
			$abss->pivot->justified = 0;
			$abss->pivot->save();


		$abs = Absence::where('seance_id', $idS)
			->where('presence', 0)
			->get();
//		dd($abs->first()->date);
		$type = Seance::where('id', $idS)->first()->type;
		$groupes = Seance::where('id', $idS)->first()->groupes;
		flashy()->success('justificatif supprimer avec succès !');
		return view('teacherSpace/consulterAbs/show', compact('groupes', 'abs', 'type'));

	}

	public function ajoutJust(Request $request)
	{
		$idS = (int)$request->input('idS');


		$idE = (int)$request->input('idE');
		$date = $request->input('date');

		$seance = Seance::where('id', $idS)->first();
		$abss = $seance->absents()->where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();
		if ($request->hasFile('img')) {
			$file = $request->file('img');
			$file_name = time() . '.' . $file->getClientOriginalExtension();
			$file->move(public_path('/uploads/photo'), $file_name);
			$abss->pivot->justification = 'uploads/photo/' . $file_name;
			$abss->pivot->justified = 1;
			$abss->pivot->save();
		}


		$abs = Absence::where('seance_id', $idS)
			->where('presence', 0)
			->get();
//		dd($abs->first()->date);
		$type = Seance::where('id', $idS)->first()->type;
		$groupes = Seance::where('id', $idS)->first()->groupes;
		flashy()->success('justificatif ajouter avec succès !');
		return view('teacherSpace/consulterAbs/show', compact('groupes', 'abs', 'type'));


	}

	public function justifier(Request $request)
	{
		$idS = (int)$request->idS;
		$idE = (int)$request->idE;
		$j = (int)$request->j;
		$date = $request->date;

		$abs = Absence::where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();
		$seance = Seance::where('id', $idS)->first();
		$abs = $seance->absents()->where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();

		if ($j == 1) {
			$abs->pivot->justified = 1;
			$abs->pivot->save();
			return response()->json(['success' => 'justifier']);
		} else {
			$abs->pivot->justified = 0;
			$abs->pivot->save();
			return response()->json(['success' => 'non justifier']);
		}

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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
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
