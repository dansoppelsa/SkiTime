<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('races', function(Blueprint $table) {
			$table->increments('id');
			$table->string('ski_hill');
			$table->date('date');
            $table->unsignedInteger('finishing_place');
			$table->unsignedInteger('racer_id');
            $table->foreign('racer_id')->references('id')->on('racers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('races');
	}

}
