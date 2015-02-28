<?php namespace App\Http\Controllers\Interest;

use App\Http\Controllers\Controller;
use App\Interest;

class ManageController extends Controller {

	public function __construct()
	{
		$this->middleware('guest'); // TODO auth
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('interest/manage', ['interests' => Interest::all()]);
	}

}
