<?php

namespace App\Http\Controllers\AdminSpace;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        

        if( $admin->id == Auth::guard('admin')->user()->id )
        {
            $request->validate([

                        'email' => 'required',
                        'password_old' => 'required'
                            ]); 

            // $admin = Admin::findOrFail($admin->id)->first();

            if( Hash::check($request->password_old, $admin->password) )
            {
                

                if($request->email!= $admin->email)
                {
                    $admin->update
                    ([
                            'email' => $request->email,
                    ]);
                    $admin->save();  
                    flashy()->success('Votre profile est mis à jour');                  
                }


                if( ($request->password != "") || ($request->email!= $admin->email) )
                {
                    if( strlen($request->password)>=8  )
                    {
                        $admin->update
                        ([
                            'password' => bcrypt($request->get('password'))
                        ]);
                        $admin->save(); 
                        flashy()->success('Votre profile est mis à jour');
                        return redirect(route('admin.parametres'));
                  
                    }
                    else
                    {
                        flashy()->error('Mot de passe doit avoir au moins 8 caractères');
                        return redirect(route('admin.parametres'));
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

        

        return redirect(route('admin.parametres'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
