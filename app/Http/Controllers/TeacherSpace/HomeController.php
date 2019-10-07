<?php

namespace App\Http\Controllers\TeacherSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$seances = Auth::guard('enseignant')->user()->seances->count();
		$cours = Auth::guard('enseignant')->user()->seances->where('type', 'Cours')->count();
		$td = Auth::guard('enseignant')->user()->seances->where('type', 'TD')->count();
		$tp = Auth::guard('enseignant')->user()->seances->where('type', 'TP')->count();
		$heures;

		return view('teacherSpace.home', compact('seances', 'cours', 'td', 'tp', 'heures'));
	}
}
