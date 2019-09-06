<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Seance;
use App\Models\Salle;
use App\Models\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\SeanceRequest;

class SeanceController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
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
		$seances = Seance::where('enseignant_id', Auth::guard('enseignant')->user()->id)->get();
		return view('teacherSpace/seances/index', compact('seances'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$salles = Salle::all();
		$groupes = Groupe::all();
		return view('teacherSpace/seances/create', compact('salles', 'groupes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(SeanceRequest $request)
	{
		$seance = new Seance();
		$seance->type = $request->type;
		$seance->module = $request->module;
		$seance->jour = $request->jour;
		$seance->heur_debut = $request->heur_debut;
		$seance->heur_fin = $request->heur_fin;
		$seance->salle_id = $request->salle_id;
		if ($request->input('once_two_week'))
			$seance->once_two_week = true;
		$seance->enseignant_id = Auth::guard('enseignant')->user()->id;
		$seance->save();
		$seance->groupes()->attach($request->groupes_ids);

		flashy('La séance (' . $seance->type . ' | ' . $seance->module . ') a été ajoutée !');
		return redirect()->route('seances.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function show(Seance $seance)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Seance $seance)
	{
		$salles = Salle::all();
		$groupes = Groupe::all();
		return view('teacherSpace/seances/edit', compact('seance', 'salles', 'groupes'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function update(SeanceRequest $request, Seance $seance)
	{
		$seance->type = $request->type;
		$seance->module = $request->module;
		$seance->jour = $request->jour;
		$seance->heur_debut = $request->heur_debut;
		$seance->heur_fin = $request->heur_fin;
		$seance->salle_id = $request->salle_id;
		if ($request->input('once_two_week'))
			$seance->once_two_week = true;
		$seance->enseignant_id = Auth::guard('enseignant')->user()->id;
		$seance->save();
		$seance->groupes()->detach();
		$seance->groupes()->attach($request->groupes_ids);

		flashy('La séance (' . $seance->type . ' | ' . $seance->module . ') a été modifiée !');
		return redirect()->route('seances.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Seance $seance)
	{
		$seance->delete();
		flashy('La séance (' . $seance->type . ' | ' . $seance->module . ') a été supprimée !');
		return redirect()->route('seances.index');
	}
}
