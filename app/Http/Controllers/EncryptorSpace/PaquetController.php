<?php

namespace App\Http\Controllers\EncryptorSpace;

use App\Models\Paquet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PaquetController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('encryptor');
	}

	public function notEncrypted(){
		$paquets = Paquet::where('encryptor_id', Auth::guard('encryptor')->user()->id)
											->where('encrypted', false)->get();
		return view('encryptorSpace/paquets/encrypted', compact('paquets'));
	}

	public function encrypted(){
		$paquets = Paquet::where('encryptor_id', Auth::guard('encryptor')->user()->id)
											->where('encrypted', true)->get();
		return view('encryptorSpace/paquets/encrypted', compact('paquets'));
	}

	public function hold(Paquet $paquet){
		if($paquet->encryptor_id == null){
			$paquet->encryptor_id = Auth::guard('encryptor')->user()->id;
			$paquet->save();
			flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été ajoutée a votre liste !');
			return redirect()->route('codeur-paquets.not.encrypted');
		}else{
			flashy()->warning('Vous n\'avez pas le droit ce paquet est deja pris !');
			return redirect()->back();
		}
	}

	public function encrypt(Paquet $paquet){
		if($paquet->encryptor_id == null){
			$paquet->encryptor_id = Auth::guard('encryptor')->user()->id;
			$paquet->save();
			flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été ajoutée a votre liste !');
			return redirect()->route('codeur-paquets.show', compact('paquet'));
		}else if($paquet->encryptor_id == Auth::guard('encryptor')->user()->id){
			return redirect()->route('codeur-paquets.show', compact('paquet'));
		}else {
			flashy()->warning('Vous n\'avez pas le droit ce paquet est deja pris !');
			return redirect()->back();
		}
	}

	public function return(Paquet $paquet){
		if($paquet->encryptor_id == Auth::guard('encryptor')->user()->id){
			$paquet->encrypted = true;
			$paquet->save();
			flashy('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') a été déposée !');
			return redirect()->route('codeur-paquets.index');
		}else {
			flashy()->warning('Le paquet (' . $paquet->type . ' | ' . $paquet->module . ') n\'est pas le votre !');
			return redirect()->back();
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$paquets = Paquet::where('encryptor_id', null)->get();
		return view('encryptorSpace/paquets/index', compact('paquets'));
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
	 * @param  \App\Models\Paquet  $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function show($paquet)
	{
		$paquet = Paquet::find($paquet);
		return view('encryptorSpace/paquets/show', compact('paquet'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Paquet  $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Paquet $paquet)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Paquet  $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Paquet $paquet)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Paquet  $paquet
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Paquet $paquet)
	{
		//
	}
}
