<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GreetingController extends Controller {

    public function getIndex()
    {
        return view('greeting', ['name' => 'Jason']);
    }

}
