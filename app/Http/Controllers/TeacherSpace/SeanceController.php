<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Seance;
use App\Models\Salle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SeanceController extends Controller
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
		$seances = Seance::where('enseignant_id', Auth::guard('enseignant')->user()->id)->get();
		$salles = Salle::all();
		return view('teacherSpace/seances/index', compact('seances', 'salles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		// return view('teacherSpace/seances/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function show(Seance $seance)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Seance $seance)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Seance $seance)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Seance  $seance
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Seance $seance)
	{
		$seance->delete();
		flashy('La séance a été supprimée !');
		return redirect()->route('seances.index');
	}
}
