<?php

namespace App\Http\Controllers\AdminSpace;

use App\Models\Groupe;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use App\Imports\EtudiantsImport;

class GroupeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$groupes = Groupe::all();
		return view('adminSpace/groupes/index', compact('groupes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('adminSpace/groupes/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'specialite' => 'required|min:2|max:190',
			'numero' => 'required|numeric',
			'annee' => 'required|min:8|max:10|regex:#^[0-9]{4}/[0-9]{4}$#',
			'etudiants' => 'required|file|mimes:xls,xlsx'
		]);

		$groupe = new Groupe();
		$groupe->specialite = $request->specialite;
		$groupe->numero = $request->numero;
		$groupe->annee = $request->annee;
		$groupe->save();

		// $path = $request->file('etudiants')->getRealPath();

		$data = Excel::import(new EtudiantsImport($groupe), $request->file('etudiants'));

		flashy('Le groupe ' . $groupe->fullName . ' a été ajoutée !');
		return redirect()->route('groupes.show', $groupe);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Groupe $groupe
	 * @return \Illuminate\Http\Response
	 */
	public function show(Groupe $groupe)
	{

		return view('adminSpace/groupes/show', compact('groupe'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Groupe $groupe
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Groupe $groupe)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Groupe $groupe
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Groupe $groupe)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Groupe $groupe
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Groupe $groupe)
	{
		$groupe->delete();
		flashy('Le groupe ' . $groupe->fullName . ' a été supprimée !');
		return redirect()->route('groupes.index');
	}

	/**
	 * Remove the student from groupe.
	 *
	 * @param \App\Models\Groupe $groupe
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function detach(Groupe $groupe, Etudiant $etudiant)
	{
		$groupe->etudiants()->detach($etudiant);
		flashy("l'etudiant " . $etudiant->fullName . "a été détaché du groupe " . $groupe->fullName);
		return back();
	}

	public function showAddStudents(Groupe $groupe)
	{
		$etudiants = Etudiant::all();
		// $etudiants = Etudiant::all()->diff($groupe->etudiants());
		return view('adminSpace/groupes/addStudents', compact('groupe', 'etudiants'));
	}

	public function addStudent(Groupe $groupe, Etudiant $etudiant)
	{
		if (!$groupe->etudiants->contains($etudiant)) {
			$groupe->etudiants()->attach($etudiant);
			flashy("l'etudiant " . $etudiant->fullName . " a été attaché au groupe " . $groupe->fullName);
			return back();
		} else {
			flashy()->warning("l'etudiant " . $etudiant->fullName . " est deja attaché au groupe " . $groupe->fullName);
			return back();
		}
	}

	public function addStudents(Groupe $groupe, Request $request)
	{
		$request->validate([
			'etudiants' => 'required|file|mimes:xls,xlsx'
		]);
		Excel::import(new EtudiantsImport($groupe), $request->file('etudiants'));
		flashy('Le fichier excel a été importé.');
		return redirect()->route('groupes.show', $groupe);
	}
}
