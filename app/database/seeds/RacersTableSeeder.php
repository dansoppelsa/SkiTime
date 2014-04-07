<?php

use Faker\Factory as Faker;

class RacersTableSeeder extends Seeder {

  protected $skiAreas = [
              'Alpine',
              'Batawa Ski Hill',
              'Beaver Valley Ski Club',
              'Blue Mountain',
              'Boler Mountain',
              'Brimacombe',
              'Calabogie Peaks',
              'Caledon Ski Club',
              'Centennial Park',
              'Chicopee',
              'Cobble Hills Ski Club',
              'Craigleith Ski Club',
              'Dagmar',
              'Devil\'s Elbow Ski Area',
              'Devil\'s Glen Country Club',
              'Georgian Peaks Club',
              'Glen Eden',
              'The Heights of Horseshoe Ski',
              'Hidden Valley Highlands',
              'Highlands Nordic',
              'Hockley Valley',
              'Horseshoe Valley',
              'Kamiskotia Snow Resort',
              'Lakeridge Ski Resort',
              'Laurentian Ski Hill',
              'Loch Lomond Ski Area',
              'Mansfield Ski Club',
              'Mount St. Louis Moonstone',
              'Oshawa Ski Club',
              'Osler Bluff Ski Club',
              'Searchmont',
              'Snow Valley'
        ];

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
              // Randomly select user to belong to
              // Assuming users table has just been built and seeded
              $userID = rand( 1 , DB::table('users')->count() );

              DB::table('racers')->insert([
                "first_name" => $faker->firstName,
                "last_name" => $faker->lastName,
                "dob" => $faker->dateTimeBetween("-16years"  , "-9years"),
                "home_ski_hill" => $this->skiAreas[ rand( 0 , count( $this->skiAreas ) - 1 ) ],
                "user_id" => $userID
                    ]);
		}
	}



}

