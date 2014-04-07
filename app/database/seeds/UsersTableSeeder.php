<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

    $createdAt = $faker->dateTimeThisYear;
    $createdAt = date("Y-m-d H:i:s" , $createdAt->getTimeStamp());

    DB::table('users')->insert([
      "email" => 'dan@soupbowl.ca',
      "password" => Hash::make('banana'),
      "first_name" => 'Dan',
      "last_name" => 'Soppelsa',
      "paid" => 1,
      "created_at" => $createdAt,
      "updated_at" => $createdAt
    ]);

    DB::table('users')->insert([
      "email" => 'ewgallacher@gmail.com',
      "password" => Hash::make('wiiwiiwii'),
      "first_name" => 'Ewan',
      "last_name" => 'Gallacher',
      "paid" => 1,
      "created_at" => $createdAt,
      "updated_at" => $createdAt
    ]);

		foreach(range(1, 10) as $index)
		{
      $paid = rand( 1 , 10 ) > 7 ? 1 : 0;
      $createdAt = $faker->dateTimeThisYear;
      $createdAt = date("Y-m-d H:i:s" , $createdAt->getTimeStamp());

			DB::table('users')->insert([
        "email" => $faker->email,
        "password" => Hash::make('banana'),
        "first_name" => $faker->firstName,
        "last_name" => $faker->lastName,
        "paid" => $paid,
        "created_at" => $createdAt,
        "updated_at" => $createdAt
			]);
		}
	}

}