<?php

use Faker\Factory as Faker;

class RacesTableSeeder extends Seeder {


	public function run()
	{
		$faker = Faker::create();

		foreach( Times\Racers\Racer::all() as $racer ) {

      $races = [
        [
          'ski_hill' => DB::table('ski_hills')->orderByRaw('RAND()')->first()->name,
          'date' => $faker->dateTimeBetween( '-3 months' , '-1 month' ),
          'racer_id' => $racer->id
        ],
        [
          'ski_hill' => DB::table('ski_hills')->orderByRaw('RAND()')->first()->name,
          'date' => $faker->dateTimeBetween( '-3 months' , '-1 month' ),
          'racer_id' => $racer->id
        ],
        [
          'ski_hill' => DB::table('ski_hills')->orderByRaw('RAND()')->first()->name,
          'date' => $faker->dateTimeBetween( '-3 months' , '-1 month' ),
          'racer_id' => $racer->id
        ],
      ];

      DB::table('races')->insert($races);
    }
	}



}

