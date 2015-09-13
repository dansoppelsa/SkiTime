<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordResetCodesTable extends Migration {


	public function up()
	{
		Schema::create('password_reset_codes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->string('code');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}



	public function down()
	{
		Schema::drop('password_reset_codes');
	}

}
