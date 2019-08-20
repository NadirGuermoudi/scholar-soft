<?php

namespace App\Http\Controllers\TeacherSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParametresController extends Controller
{

	public function __construct()
	{
	    $this->middleware('enseignant');
	}

    public function index()
    {
    	return view('teacherSpace/parametres/index');
    }
}

?>