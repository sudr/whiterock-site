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
	public function getIndex()
	{
		return view('interest/manage', ['interests' => Interest::all()]);
	}

	public function getDetail()
	{
		return view('interest/detail');
	}
	
	public function postInterest($name, $email, $phone, $date, $removed, $trailId)
	{
		$interest = new Interest();
		$interest->name('name');
		$interest->email('email');
		$interest->phone('phone');
		$interest->date('date');
		$interest->trailId('location');
		$interest->removed('removed');
		$interest->trailId('trailId');
		
		return $interest;
	}
	
	public function putInterest($name, $email, $phone, $date, $removed, $trailId, $photoId)
	{
		$interest = new Interest();
	
		$interest->name('name');
		$interest->email('email');
		$interest->phone('phone');
		$interest->date('date');
		$interest->location('location');
		$interest->removed('removed');
		$interest->trailId('trailId');
		$interest->photoId('photoId');
		// for create
		//'created',
	
		return $interest;
	}
	
}
