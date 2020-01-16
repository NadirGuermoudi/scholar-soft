<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Absence;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\AbstractSessionHandler;

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

	public function indexExclus()
	{
		$data = Auth::guard('enseignant')->user()->seances;
		$eId = Auth::guard('enseignant')->user()->id;

		return view('teacherSpace/consulterExclus/index', compact('eId', 'data'));
	}

	public function afficherExclus(Request $request)
	{
		$id = (int)$request->seance;
		$seance = Absence::where('seance_id', $id)->get();
		$groupes = Seance::where('id', $id)->first()->groupes;
		$g = Seance::where('id', $id)->first();

		$abs = Absence::where('seance_id', $id)->get();
		$exclusJ = [];
		$exclusNj = [];

		foreach ($abs as $a) {
			$i = $a->etudiant->id;
			$absJ = Absence::where('etudiant_id', $i)->where('justified', 1)->count();
			$absNj = Absence::where('etudiant_id', $i)->where('justified', 0)->count();
			if ($absJ >= 5) {
				if (!in_array($a->etudiant, $exclusJ))
					array_push($exclusJ, $a->etudiant);
			}
			if ($absNj >= 3) {
				if (!in_array($a->etudiant, $exclusNj))
					array_push($exclusNj, $a->etudiant);
			}
		}

		$type = Seance::where('id', $id)->first()->type;

		return view('teacherSpace/consulterExclus/show', compact('g','groupes', 'exclusJ', 'exclusNj', 'type'));
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

	public function suppJus(Request $request)
	{
		$idS = (int)$request->input('idS');


		$idE = (int)$request->input('idE');
		$date = $request->input('date');

		$seance = Seance::where('id', $idS)->first();
		$abss = Absence::where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();
		File::delete($abss->justification);
		$abss->justification = null;
		$abss->justified = 0;
		$abss->save();

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
    
		if ($request->hasFile('img')) {
			$abss = Absence::where('date', $date)
				->where('etudiant_id', $idE)
				->where('seance_id', $idS)
				->first();


			$file = $request->file('img');
			$file_name = time() . '.' . $file->getClientOriginalExtension();
			$abss->justification = 'uploads/photo/' . $file_name;
			$abss->justified = 1;
			$abss->save();

			$file->move(public_path('/uploads/photo'), $file_name);

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
		$abs = Absence::where('date', $date)
			->where('etudiant_id', $idE)
			->where('seance_id', $idS)
			->first();
		if ($j == 1) {
			$abs->justified = 1;
			$abs->save();
			return response()->json(['success' => 'justifier']);
		} else {
			$abs->justified = 0;
			$abs->save();
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
