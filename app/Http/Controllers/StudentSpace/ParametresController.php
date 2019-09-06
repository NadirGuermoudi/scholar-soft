<?php

namespace App\Http\Controllers\StudentSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametresController extends Controller
{

	public function __construct()
	{
		$this->middleware('etudiant');
	}

	public function index()
	{
		return view('studentSpace/parametres/index');
	}
}

?>
