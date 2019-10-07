<?php

namespace App\Http\Controllers\TeacherSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Enseignant;

class MailsController extends Controller
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

	public function index(){
		$groupes = Groupe::all();
		return view('teacherSpace/mails/index', compact('groupes'));
	}

	public function teachers(Request $request){
		$seances = Groupe::find($request->groupe)->seances()->get();
		$mails = "";
		foreach ($seances as $key => $seance) {
			$mails .= $seance->enseignant->email . ';';
		}

		return $mails;
	}

	public function students(Request $request){
		$etudiants = Groupe::find($request->groupe)->etudiants()->get();
		$mails = "";
		foreach ($etudiants as $key => $etudiant) {
			$mails .= $etudiant->email . ';';
		}

		return $mails;
	}

	public function allTeachers(){
		$enseignants = Enseignant::all();
		return view('teacherSpace/mails/allTeachers', compact('enseignants'));
	}

	public function allStudents(){
		$etudiants = Etudiant::all();
		return view('teacherSpace/mails/allStudents', compact('etudiants'));
	}
}
