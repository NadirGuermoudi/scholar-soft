<?php

namespace App\Imports;

use App\Models\Etudiant;
use App\Models\Groupe;
use Maatwebsite\Excel\Concerns\ToModel;

class EtudiantsImport implements ToModel
{
	private $groupe;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Groupe $groupe)
	{
		$this->groupe = $groupe;
	}

	/**
	* @param array $row
	*
	* @return \Illuminate\Database\Eloquent\Model|null
	*/
	public function model(array $row)
	{
		if($row[0] == null) return null;
		$etudiant = Etudiant::where('matricule', $row[0])->first();

		if($etudiant){
			if(!$this->groupe->etudiants()->get()->contains($etudiant))
				$this->groupe->etudiants()->attach($etudiant);
		}else{
			$etudiant = new Etudiant();
			$etudiant->matricule = $row[0];
			$etudiant->nom = $row[1];
			$etudiant->prenom = $row[2];
			if($row[3] != "")
				$etudiant->date_naissance = date('Y-m-d', mktime(0, 0, 0, 1, $row[3] -1, 1900));
			if($row[4])
				$etudiant->email = $row[4];
			else
				$etudiant->email = $row[0] . '@scholar-soft.com';
			$etudiant->password = bcrypt(substr(md5($row[1] . $row[0] . $row[2]), 5, 10));
			$etudiant->save();

			$this->groupe->etudiants()->attach($etudiant);
		}

		return $etudiant;
	}
}
