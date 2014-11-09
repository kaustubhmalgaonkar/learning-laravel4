<?php

class UserSeeder extends Seeder{

	public function run(){
		DB::table('users')->truncate();

		$user = new User;
		$user->username = 'kaustubhmalgaonkar@gmail.com';
		$user->password = hash('sha256','password');
		$user->active = 1;
		$user->save();
	}

}