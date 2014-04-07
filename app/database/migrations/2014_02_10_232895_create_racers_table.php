<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRacersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('racers', function(Blueprint $table) {
			$table->increments('id');
			$table->string( 'first_name' , 100 );
			$table->string( 'last_name' , 100 );
			$table->date( 'dob' );
      $table->string( 'home_ski_hill' , 100 );
      $table->unsignedInteger( 'user_id' );
      $table->foreign( 'user_id' )->references( 'id' )->on( 'users' );
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('racers');
	}

}
