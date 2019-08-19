<?php

namespace App\Http\Controllers\StudentSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;

use Illuminate\Support\Facades\Hash;

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
        

        $request->validate([
                        'email' => 'required',
                        'password_old' => 'required'
        ]); 

        $etudiant = Etudiant::findOrFail($id)->first();
        $passwordRequest = bcrypt($request->password_old);
        // DD(strcmp( $etudiant->password , $passwordRequest )."\n etPass=".$etudiant->password." password_old_form=".$passwordRequest);
        // if(     strcmp( $etudiant->password , $passwordRequest )  == 0  )
        if( Hash::check($request->password_old, $etudiant->password) )
        {
            $etudiant->update
            ([
                'email' => $request->email,
                'password' => bcrypt($request->get('password'))
            ]);
        
            $etudiant->save();
            flashy('Votre profile est mis à jour');
        
        }
        
        else
        {
            flashy('Ancien mot de passe incorrecte');
        }

        return redirect(route('student.parametres'));



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
