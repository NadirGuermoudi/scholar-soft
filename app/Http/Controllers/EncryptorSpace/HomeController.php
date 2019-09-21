<?php

namespace App\Http\Controllers\EncryptorSpace;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Paquet;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
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

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$encrypted = Paquet::where('encryptor_id', Auth::guard('encryptor')->user()->id)
											->where('encrypted', true)->count();
		$notEncrypted = Paquet::where('encryptor_id', Auth::guard('encryptor')->user()->id)
																			->where('encrypted', false)->count();
		$notHolded = Paquet::where('encryptor_id', null)->count();
		$notEncryptedAll = Paquet::where('encrypted', false)->count();

		$encryptedAll = Paquet::where('encrypted', true)->count();

		$notHoldedLate = Paquet::where('encryptor_id', null)->whereDate('date_limite_encryptor', '<', Carbon::today())->count();
		$notEncryptedLate = Paquet::where('encryptor_id', Auth::guard('encryptor')->user()->id)
																			->where('encrypted', false)
																			->whereDate('date_limite_encryptor', '<', Carbon::today())->count();
		$notEncryptedAllLate = Paquet::where('encrypted', false)->whereDate('date_limite_encryptor', '<', Carbon::today())->count();

		return view('encryptorSpace.home', compact('encrypted', 'notEncrypted', 'notHolded', 'notEncryptedAll', 'encryptedAll', 'notHoldedLate', 'notEncryptedLate', 'notEncryptedAllLate'));
	}
}
