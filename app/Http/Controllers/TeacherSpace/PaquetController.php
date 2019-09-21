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
		if ($paquet->correcteur3_id != null && $paquet->correcteur2_id == null) {
			$paquet->correcteur2_id = $paquet->correcteur3_id;
			$paquet->correcteur3_id = null;
		}
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
		$paquets = Paquet::where('responsable_id', '=', Auth::guard('enseignant')->user()->id)
			->where(function ($query) {
				$query->where([['correcteur2_id', '=', null], ['correcteur3_id', '=', null], ['correcteur1_rendu', true]])
					->orWhere([['correcteur3_id', '=', null], ['correcteur1_rendu', true], ['correcteur2_rendu', true]])
					->orWhere([['correcteur1_rendu', true], ['correcteur2_rendu', true], ['correcteur3_rendu', true]]);
			})->get();
		if ($paquets->contains($paquet)) {
			return view('teacherSpace/paquets/show', compact('paquet'));
		} else {
			flashy()->warning('Vous n\'avez pas le droit !');
			return redirect()->back();
		}
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
		if ($request->correcteur2_id != 0) $paquet->correcteur2_id = $request->correcteur2_id; else $paquet->correcteur2_id = null;
		if ($request->correcteur3_id != 0) $paquet->correcteur3_id = $request->correcteur3_id; else $paquet->correcteur3_id = null;
		if ($paquet->correcteur3_id != null && $paquet->correcteur2_id == null) {
			$paquet->correcteur2_id = $paquet->correcteur3_id;
			$paquet->correcteur3_id = null;
		}
		$paquet->save();

		$this->calculate($paquet);

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

	public function return(Paquet $paquet, int $correcteur)
	{
		$this->calculate($paquet);
		if ($correcteur == 0) {
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

		if ($correcteur == 1) {
			$allCorrected = $paquet->etudiants()->wherePivot('note1', null)->get()->first() == null ? true : false;
			if (!$allCorrected) {
				flashy()->warning('Vous devez remplir tous les notes !');
				return redirect()->back();
			}
			if ($paquet->correcteur1_id == Auth::guard('enseignant')->user()->id) {
				$paquet->correcteur1_rendu = true;
				$paquet->save();
				flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été déposée !');
				return redirect()->route('paquets.correct');
			} else {
				flashy()->warning('Vous n\'avez pas le droit !');
				return redirect()->route('paquets.index');
			}
		}

		if ($correcteur == 2) {
			$allCorrected = $paquet->etudiants()->wherePivot('note2', null)->get()->first() == null ? true : false;
			if (!$allCorrected) {
				flashy()->warning('Vous devez remplir tous les notes !');
				return redirect()->back();
			}
			if ($paquet->correcteur2_id == Auth::guard('enseignant')->user()->id) {
				$paquet->correcteur2_rendu = true;
				$paquet->save();
				flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été déposée !');
				return redirect()->route('paquets.correct');
			} else {
				flashy()->warning('Vous n\'avez pas le droit !');
				return redirect()->route('paquets.index');
			}
		}

		if ($correcteur == 3) {
			//if all corrected verification
			foreach ($paquet->etudiants()->get() as $key => $etudiant) {
				if ((abs($etudiant->pivot->note1 - $etudiant->pivot->note2) > $paquet->difference) && $etudiant->pivot->note3 == null) {
					flashy()->warning('Vous devez remplir tous les notes !');
					return redirect()->back();
				}
			}
			if ($paquet->correcteur3_id == Auth::guard('enseignant')->user()->id) {
				$paquet->correcteur3_rendu = true;
				$paquet->save();
				flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été déposée !');
				return redirect()->route('paquets.correct');
			} else {
				flashy()->warning('Vous n\'avez pas le droit !');
				return redirect()->route('paquets.index');
			}
		}
	}

	public function correctList()
	{
		$paquets = Paquet::where([['correcteur1_id', '=', Auth::guard('enseignant')->user()->id], ['correcteur1_rendu', '=', false]])
			->orWhere([['correcteur2_id', '=', Auth::guard('enseignant')->user()->id], ['correcteur2_rendu', '=', false]])
			->orWhere([['correcteur3_id', '=', Auth::guard('enseignant')->user()->id], ['correcteur3_rendu', '=', false]])->get();
		return view('teacherSpace/paquets/correctList', compact('paquets'));
	}

	public function correctOneView(Paquet $paquet, int $correcteur)
	{
		if ($paquet->correcteur1_id == Auth::guard('enseignant')->user()->id && $correcteur == 1) {
			$etudiants = $paquet->etudiants()->get();
			return view('teacherSpace/paquets/correctOne', compact('paquet', 'etudiants', 'correcteur'));
		}
		if ($paquet->correcteur2_id == Auth::guard('enseignant')->user()->id && $correcteur == 2) {
			$etudiants = $paquet->etudiants()->get();
			return view('teacherSpace/paquets/correctOne', compact('paquet', 'etudiants', 'correcteur'));
		}
		if ($paquet->correcteur3_id == Auth::guard('enseignant')->user()->id && $correcteur == 3) {
			$etudiants = $paquet->etudiants()->whereRaw('abs(notes.note1 - notes.note2) > ?', $paquet->difference)->get();
			return view('teacherSpace/paquets/correctOne', compact('paquet', 'etudiants', 'correcteur'));
		}

		return redirect()->back();
	}

	public function correctOne(Request $request)
	{
		$paquet = Paquet::find($request->paquet);

		if ($request->correcteur == 1 && $paquet->correcteur1_id == Auth::guard('enseignant')->user()->id && $paquet->correcteur1_rendu == false) {
			$etudiant = $paquet->etudiants()->wherePivot('code', $request->code)->first();
			$etudiant->pivot->note1 = $request->note;
			$etudiant->pivot->save();
			return 1;
		} else if ($request->correcteur == 2 && $paquet->correcteur2_id == Auth::guard('enseignant')->user()->id && $paquet->correcteur2_rendu == false) {
			$etudiant = $paquet->etudiants()->wherePivot('code', $request->code)->first();
			$etudiant->pivot->note2 = $request->note;
			$etudiant->pivot->save();
			return 1;
		} else if ($request->correcteur == 3 && $paquet->correcteur3_id == Auth::guard('enseignant')->user()->id && $paquet->correcteur3_rendu == false) {
			$etudiant = $paquet->etudiants()->wherePivot('code', $request->code)->first();
			$etudiant->pivot->note3 = $request->note;
			$etudiant->pivot->save();
			return 1;
		}

		return 0;
	}

	public function corrected()
	{
		$paquets = Paquet::where('responsable_id', '=', Auth::guard('enseignant')->user()->id)
			->where(function ($query) {
				$query->where([['correcteur2_id', '=', null], ['correcteur3_id', '=', null], ['correcteur1_rendu', true]])
					->orWhere([['correcteur3_id', '=', null], ['correcteur1_rendu', true], ['correcteur2_rendu', true]])
					->orWhere([['correcteur1_rendu', true], ['correcteur2_rendu', true], ['correcteur3_rendu', true]]);
			})->get();
		return view('teacherSpace/paquets/corrected', compact('paquets'));
	}

	private function calculate(Paquet $paquet)
	{
		$correcteur3 = false;
		if ($paquet->correcteur2_id == null && $paquet->correcteur3_id == null) {
			foreach ($paquet->etudiants()->get() as $etudiant) {
				$etudiant->pivot->note = $etudiant->pivot->note1;
				$etudiant->pivot->save();
			}
		} else if ($paquet->correcteur3_id == null) {
			foreach ($paquet->etudiants()->get() as $key => $etudiant) {
				$paquet->type_calcul == 'MAX' ? $etudiant->pivot->note = max($etudiant->pivot->note1, $etudiant->pivot->note2) : ($etudiant->pivot->note1 + $etudiant->pivot->note2) / 2;
				$etudiant->pivot->save();
			}
		} else {
			foreach ($paquet->etudiants()->get() as $key => $etudiant) {
				$paquet->type_calcul == 'MAX' ? $etudiant->pivot->note = max($etudiant->pivot->note1, $etudiant->pivot->note2) : ($etudiant->pivot->note1 + $etudiant->pivot->note2) / 2;
				if (abs($etudiant->pivot->note1 - $etudiant->pivot->note2) > $paquet->difference) {
					$correcteur3 = true;
					$etudiant->pivot->note = $etudiant->pivot->note3;
				}
				$etudiant->pivot->save();
			}
			if ($correcteur3 == false) $paquet->correcteur3_rendu = true;
		}
	}
}
