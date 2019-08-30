<?php

namespace App\Http\Controllers\TeacherSpace;

use App\Models\Enseignant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function show(Enseignant $enseignant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function edit(Enseignant $enseignant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enseignant $enseignant)
    {


        if( $enseignant->id == Auth::guard('enseignant')->user()->id )
        {
            $request->validate([

                        'email' => 'required',
                        'password_old' => 'required'
                            ]); 

            // $enseignant = Enseignant::findOrFail($enseignant->id)->first();

            if( Hash::check($request->password_old, $enseignant->password) )
            {
                

                if($request->email!= $enseignant->email)
                {
                    $enseignant->update
                    ([
                            'email' => $request->email,
                    ]);
                    $enseignant->save();  
                    flashy()->success('Votre profile est mis à jour');                  
                }


                if( ($request->password != "") || ($request->email!= $enseignant->email) )
                {
                    if( strlen($request->password)>=8  )
                    {
                        $enseignant->update
                        ([
                            'password' => bcrypt($request->get('password'))
                        ]);
                        $enseignant->save(); 
                        flashy()->success('Votre profile est mis à jour');
                        return redirect(route('teacher.parametres'));
                    }
                    else
                    {
                        flashy()->error('Mot de passe doit avoir au moins 8 caractères');
                        return redirect(route('teacher.parametres'));
                    }
                    
                }

                flashy()->error('Aucune modification n\' été effectuée');
            
                
            }
            
            else
            {
                flashy()->error('Ancien mot de passe incorrecte');
            }
        }

        else
        {
                flashy()->error('Page non autorisée');
        }

        

        return redirect(route('teacher.parametres'));

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enseignant  $enseignant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enseignant $enseignant)
    {
        //
    }
}
