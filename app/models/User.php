<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function authUser($username, $password){

		if($username != '' && $password != ''){
			$query = DB::table($this->table);
			$query->where('username',$username);
			$query->where('password',hash('sha256',$password));
			$result = $query->first();

			if($result){
				$this->setUserSession($result);
				return true;
			}else{
				// worng username or password
				return false;
			}
		}else{
			// username or password not provided
			return false;
		}

	}

	private function setUserSession($user){
		$userSession = array(
			'user_id' => $user->id,
			'email' => $user->username,
			'auth' =>1
		);
		Session::put('auth',$userSession);
	}

	public function checkIfloggedIn(){
		$value = Session::get('auth');
		if($value['auth'] == 1){
			return true;
		}
	}

}
