<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeanceRequest extends FormRequest
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
		return [
			'type' => 'required|in:Cours,TD,TP',
			'module' => 'required|min:2|max:190',
			'jour' => 'required|in:DIMANCHE,LUNDI,MARDI,MERCREDI,JEUDI,VENDREDI,SAMEDI',
			'heur_debut' => 'required|date_format:H:i',
			'heur_fin' => 'required|date_format:H:i',
			'salle_id' => 'required|numeric',
			'groupes_ids' => 'required'
		];
	}
}
