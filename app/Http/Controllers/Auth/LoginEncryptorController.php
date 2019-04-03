<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginEncryptorController extends Controller
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
		return Auth::guard('encryptor');
	}

	// login from for teacher
	public function showLoginForm()
	{
		return view('auth.loginEncryptor');
	}
}
