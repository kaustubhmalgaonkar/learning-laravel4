<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('blogs');
		Schema::create('blogs',function($table){
			$table->engine = 'InnoDB';
			$table->increments('id')->comment('Unique Key');
			$table->string('title')->comment('Blog title');
			$table->text('summary')->comment('Blog summary');
			$table->text('body')->comment('Blog body');
			$table->boolean('published')->default(0);
			$table->unsignedInteger('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('blogs');	
	}

}
