<?php

namespace App\Http\Controllers\AdminSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametresController extends Controller
{

	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		return view('adminSpace/parametres/index');
	}
}

?>
