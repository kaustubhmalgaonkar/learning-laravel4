<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('users');

		Schema::create('users',function($table){
			$table->engine = 'InnoDB';
			$table->increments('id')->comment('Unique Key');
			$table->string('username')->comment('User Name');
			$table->string('password')->comment('Password');
			$table->boolean('active')->default(0);
			$table->timestamps();

			$table->unique('username');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
