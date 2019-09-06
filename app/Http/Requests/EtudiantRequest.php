<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$etudiantID = 0;
		if ($this->etudiant)
			$etudiantID = $this->etudiant->id;
		return [
			'matricule' => 'required|min:5',
			'nom' => 'required|min:2|max:190',
			'prenom' => 'required|min:2|max:190',
			'date_naissance' => 'required|date',
			'email' => 'required|email|max:190|unique:etudiants,email,' . $etudiantID,
			'password' => 'required|string|min:8',
		];
	}
}
