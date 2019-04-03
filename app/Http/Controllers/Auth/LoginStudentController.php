<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginStudentController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = '/home';

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	/**
	_
	_ @return property guard use for login
	_
	*/
	public function guard()
	{
		return Auth::guard('etudiant');
	}

	// login from for student
	public function showLoginForm()
	{
		return view('auth.loginStudent');
	}
}
