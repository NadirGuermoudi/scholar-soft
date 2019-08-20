<?php

namespace App\Http\Controllers\AdminSpace;

use Illuminate\Http\Request;
use App\Models\Salle;
use App\Http\Controllers\Controller;


class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    
    public function index()
    {
        $salles = Salle::all();
        return view('adminSpace/salles/index', compact('salles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('adminSpace/salles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                        'nom' => 'required',
                        'capacite' => 'required'
        ]); 

        Salle::create($request->except(['_token']));

        flashy('la salle est crée');
        return redirect()->route('salles.index')->with('success','la salle est ajoutée avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $request->validate([
                        'nom' => 'required',
                        'capacite' => 'required'
        ]); 

        $salle = Salle::findOrFail($id)->first();
        $salle->update([
            'nom' => $request->nom,
            'capacite' => $request->capacite
        ]);

        flashy('mise à jour de salle effectuée');
        return redirect(route('salles.index'));



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        Salle::destroy($id);
        flashy('vous avez supprimée une salle');
        return redirect()->route('salles.index')->with('success',
                         'Vous avez supprimé une salle');

    }
}