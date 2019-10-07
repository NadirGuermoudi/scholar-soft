<?php

namespace App\Http\Controllers\EncryptorSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Enseignant;

class MailsController extends Controller
{
	public function index(){
		$enseignants = Enseignant::all();
		return view('encryptorSpace/mails/index', compact('enseignants'));
	}
}
