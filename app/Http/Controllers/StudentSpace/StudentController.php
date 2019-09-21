<?php

namespace App\Http\Controllers\StudentSpace;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class StudentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Etudiant $etudiant)
	{

		if ($etudiant->id == Auth::guard('etudiant')->user()->id) {
			$request->validate([

				'email' => 'required',
				'password_old' => 'required'
			]);

			// $etudiant = Etudiant::findOrFail($etudiant->id)->first();

			if (Hash::check($request->password_old, $etudiantBDD->password)) {


				if ($request->email != $etudiant->email) {
					$etudiant->update
					([
						'email' => $request->email,
					]);
					$etudiant->save();
					flashy()->success('Votre profile est mis à jour');
				}


				if (($request->password != "") || ($request->email != $etudiant->email)) {
					if (strlen($request->password) >= 8) {
						$etudiant->update
						([
							'password' => bcrypt($request->get('password'))
						]);
						$etudiant->save();
						flashy()->success('Votre profile est mis à jour');
						return redirect(route('student.parametres'));

					} else {
						flashy()->error('Mot de passe doit avoir au moins 8 caractères');
						return redirect(route('student.parametres'));
					}

				}

				flashy()->error('Aucune modification n\' été effectuée');


			} else {
				flashy()->error('Ancien mot de passe incorrecte');
			}
		} else {
			flashy()->error('Page non autorisée');
		}


		return redirect(route('student.parametres'));


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Etudiant $etudiant
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Etudiant $etudiant)
	{
		//
	}
}
