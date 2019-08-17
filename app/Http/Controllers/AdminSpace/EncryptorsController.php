<?php

namespace App\Http\Controllers\AdminSpace;

use App\Models\Encryptor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EncryptorsController extends Controller
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
		$encryptors = Encryptor::all();
		return view('adminSpace/encryptors/index', compact('encryptors'));
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
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'nom' => 'required',
			'prenom' => 'required',
			'email' => 'required|email',
			'password' => 'required'
		]);


		$encryptor = new Encryptor();

		$encryptor->nom = $request->input('nom');
		$encryptor->prenom = $request->input('prenom');
		$encryptor->email = $request->input('email');
		$encryptor->password = bcrypt($request->input('password'));
		$encryptor->save();

		flashy()->success('Chiffreur creer avec succès ', 'http://your-awesome-link.com');
		return redirect()->route('encryptors.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Encryptor $encryptor
	 * @return \Illuminate\Http\Response
	 */
	public function show(Encryptor $encryptor)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Encryptor $encryptor
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Encryptor $encryptor)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Encryptor $encryptor
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$encryptor = Encryptor::where('id', '=', $id)->first();

		$request->validate([
			'nom' => 'required',
			'prenom' => 'required',
			'email' => 'required|email'
		]);

		$encryptor->nom = $request->get('nom');
		$encryptor->prenom = $request->get('prenom');

		$encryptor->email = $request->get('email');

		if ($request->get('password'))
			$encryptor->password = bcrypt($request->get('password'));

		$encryptor->save();

		flashy()->success('Chiffreur modifier avec succès ', 'http://your-awesome-link.com');
		return redirect()->route('encryptors.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Encryptor $encryptor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Encryptor::destroy($id);

		flashy()->success('Chiffreur supprimer avec succès ', 'http://your-awesome-link.com');
		return redirect()->route('encryptors.index');
	}
}
