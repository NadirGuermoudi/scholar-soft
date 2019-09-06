<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Paquet;
use App\Models\Groupe;
use App\Models\Enseignant;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaquetController extends Controller
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
		$paquets = Paquet::where('responsable_id', Auth::guard('enseignant')->user()->id)->get();
		return view('teacherSpace/paquets/index', compact('paquets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$groupes = Groupe::all();
		$enseignants = Enseignant::all();
		return view('teacherSpace/paquets/create', compact('groupes', 'enseignants'));
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
			'type' => 'required|in:EXAM,CC',
			'module' => 'required|min:2|max:190',
			'groupe_id' => 'required|numeric',
			'type_calcul' => 'required|in:MAX,MOY',
			'difference' => 'required|numeric',
			'date_limite_encryptor' => 'required|date',
			'date_limite_correcteur1' => 'required|date',
			'date_limite_correcteur2' => 'nullable|date',
			'date_limite_correcteur3' => 'nullable|date',
			'correcteur1_id' => 'required|numeric',
			'correcteur2_id' => 'numeric',
			'correcteur3_id' => 'numeric'
		]);

		$etudiants = Groupe::find($request->groupe_id)->etudiants()->get();
		$randomCodes = no_repeat(1, 999, $etudiants->count());

		$paquet = new Paquet();
		$paquet->module = $request->module;
		$paquet->type = $request->type;
		$paquet->type_calcul = $request->type_calcul;
		$paquet->difference = $request->difference;
		$paquet->date_limite_encryptor = $request->date_limite_encryptor;
		$paquet->date_limite_correcteur1 = $request->date_limite_correcteur1;
		$paquet->date_limite_correcteur2 = $request->date_limite_correcteur2;
		$paquet->date_limite_correcteur3 = $request->date_limite_correcteur3;
		if ($request->responsable_rendu) $paquet->responsable_rendu = true;
		$paquet->responsable_id = Auth::guard('enseignant')->user()->id;
		$paquet->correcteur1_id = $request->correcteur1_id;
		if ($request->correcteur2_id != 0) $paquet->correcteur2_id = $request->correcteur2_id;
		if ($request->correcteur3_id != 0) $paquet->correcteur3_id = $request->correcteur3_id;
		$paquet->save();

		foreach ($etudiants as $key => $etudiant) {
			$paquet->etudiants()->attach($etudiant, ['code' => $randomCodes[$key]]);
		}

		flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été ajoutée !');
		return redirect()->route('paquets.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Paquet $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function show(Paquet $paquet)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Paquet $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Paquet $paquet)
	{
		$groupes = Groupe::all();
		$enseignants = Enseignant::all();
		return view('teacherSpace/paquets/edit', compact('paquet', 'groupes', 'enseignants'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Paquet $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Paquet $paquet)
	{
		$request->validate([
			'type' => 'required|in:EXAM,CC',
			'module' => 'required|min:2|max:190',
			'type_calcul' => 'required|in:MAX,MOY',
			'difference' => 'required|numeric',
			'date_limite_encryptor' => 'required|date',
			'date_limite_correcteur1' => 'required|date',
			'date_limite_correcteur2' => 'nullable|date',
			'date_limite_correcteur3' => 'nullable|date',
			'correcteur1_id' => 'required|numeric',
			'correcteur2_id' => 'numeric',
			'correcteur3_id' => 'numeric'
		]);

		$paquet->module = $request->module;
		$paquet->type = $request->type;
		$paquet->type_calcul = $request->type_calcul;
		$paquet->difference = $request->difference;
		$paquet->date_limite_encryptor = $request->date_limite_encryptor;
		$paquet->date_limite_correcteur1 = $request->date_limite_correcteur1;
		$paquet->date_limite_correcteur2 = $request->date_limite_correcteur2;
		$paquet->date_limite_correcteur3 = $request->date_limite_correcteur3;
		if ($request->responsable_rendu) $paquet->responsable_rendu = true;
		$paquet->correcteur1_id = $request->correcteur1_id;
		if ($request->correcteur2_id != 0) $paquet->correcteur2_id = $request->correcteur2_id;
		if ($request->correcteur3_id != 0) $paquet->correcteur3_id = $request->correcteur3_id;
		$paquet->save();

		flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été modifiée !');
		return redirect()->route('paquets.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Paquet $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Paquet $paquet)
	{
		$paquet->delete();
		flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été supprimée !');
		return redirect()->route('paquets.index');
	}

	public function return(Paquet $paquet)
	{
		if ($paquet->responsable_id == Auth::guard('enseignant')->user()->id) {
			$paquet->responsable_rendu = true;
			$paquet->save();
			flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été déposée !');
			return redirect()->route('paquets.index');
		} else {
			flashy()->warning('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') n\'est pas le votre !');
			return redirect()->route('paquets.index');
		}
	}
}
