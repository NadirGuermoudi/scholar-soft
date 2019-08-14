<?php

namespace App\Http\Controllers\AdminSpace;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('adminSpace/teachers/index', compact('enseignants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminSpace/teachers/create');
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
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'grade' => 'required',
            'password' => 'required'
        ]);


        $enseignant = new Enseignant();

        $enseignant->matricule = $request->input('matricule');
        $enseignant->nom = $request->input('nom');
        $enseignant->prenom = $request->input('prenom');
        $enseignant->date_naissance = $request->input('date_naissance');
        $enseignant->grade = $request->input('grade');
        if ($request->input('admin'))
            $enseignant->admin = true;
        else
            $enseignant->admin = false;
        $enseignant->email = $request->input('email');
        $enseignant->password = bcrypt($request->input('password'));
        $enseignant->save();

			flashy()->success('Enseignant creer avec succès ', 'http://your-awesome-link.com');
        return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, $id)
    {
			$enseignant = Enseignant::where('id', '=', $id)->first();

			$request->validate([
				'matricule' => 'required',
				'nom' => 'required',
				'prenom' => 'required',
				'email' => 'required|email',
				'grade' => 'required',
			]);

			$enseignant->matricule = $request->get('matricule');
			$enseignant->nom = $request->get('nom');
			$enseignant->prenom = $request->get('prenom');
			$enseignant->date_naissance = $request->get('date_naissance');
			$enseignant->grade = $request->get('grade');

			if ($request->get('admin'))
				$enseignant->admin = true;
			else
				$enseignant->admin = false;

			$enseignant->email = $request->get('email');

			if ($request->get('password'))
				$enseignant->password = bcrypt($request->get('password'));

			$enseignant->save();

			flashy()->success('Enseignant editer avec succès ', 'http://your-awesome-link.com');
			return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Enseignant $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Enseignant::destroy($id);

			flashy()->success('Enseignant supprimer avec succès ', 'http://your-awesome-link.com');
			return redirect()->route('teachers.index');
    }
}
