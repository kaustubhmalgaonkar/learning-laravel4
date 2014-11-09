<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = 'master.html';

	public function getDashboard(){
		$this->layout->content = View::make('user.dashboard');
		$this->layout->title = 'Dashboard';
	}

	public function loginUser(){

		$username = Input::get('username');
		$password = Input::get('password');
		$user = new User;
		if($user->authUser($username,$password)){
			return Redirect::to('dashboard');
		}else{
			return Redirect::to('login');
		}
	}

	public function logout(){
		Session::flush();
		return Redirect::to('login');
	}

}
