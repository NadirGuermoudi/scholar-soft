<?php

namespace App\Http\Controllers\AdminSpace;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EtudiantRequest;

class StudentsController extends Controller
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
		$etudiants = Etudiant::all();
		return view('adminSpace/students/index', compact('etudiants'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('adminSpace/students/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(EtudiantRequest $request)
	{
		$etudiant = new Etudiant();
		$etudiant->matricule = $request->matricule;
		$etudiant->nom = $request->nom;
		$etudiant->prenom = $request->prenom;
		$etudiant->date_naissance = $request->date_naissance;
		$etudiant->email = $request->email;
		$etudiant->password = bcrypt($request->password);
		$etudiant->save();

		flashy("L'étudiant (" . $etudiant->nom . " | " . $etudiant->prenom . ") a été ajoutée !");
		return redirect()->route('etudiants.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function show(Etudiant $etudiant)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Etudiant $etudiant)
	{
		return view('adminSpace/students/edit', compact('etudiant'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function update(EtudiantRequest $request, Etudiant $etudiant)
	{
		$etudiant->matricule = $request->matricule;
		$etudiant->nom = $request->nom;
		$etudiant->prenom = $request->prenom;
		$etudiant->date_naissance = $request->date_naissance;
		$etudiant->email = $request->email;
		$etudiant->password = bcrypt($request->password);
		$etudiant->save();

		flashy("L'étudiant (" . $etudiant->nom . " | " . $etudiant->prenom . ") a été modifié !");
		return redirect()->route('etudiants.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Etudiant $etudiant)
	{
		$etudiant->delete();
		flashy("L'étudiant (" . $etudiant->nom . " | " . $etudiant->prenom . ") a été supprimée !");
		return redirect()->route('etudiants.index');
	}
}
