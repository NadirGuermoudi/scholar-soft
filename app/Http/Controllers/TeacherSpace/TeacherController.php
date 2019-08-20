<?php

namespace App\Http\Controllers\TeacherSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Enseignant;

use Illuminate\Support\Facades\Hash;
use Auth;

class TeacherController extends Controller
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
        //
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

        if( $id == Auth::guard('enseignant')->user()->id )
        {
           
            $request->validate([
                            'email' => 'required',
                            'password_old' => 'required'
            ]); 

            $enseignant = Enseignant::findOrFail($id)->first();
          
            if( Hash::check($request->password_old, $enseignant->password) )
            {
                $enseignant->update
                ([
                    'email' => $request->email,
                    'password' => bcrypt($request->get('password'))
                ]);
            
                $enseignant->save();
                flashy('Votre profile est mis à jour');
            
            }
            
            else
            {
                flashy('Ancien mot de passe incorrecte');
            }

        }
        else
        {
            flashy()->error('Accès non autorisé');
        }

        return redirect(route('teacher.parametres'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
