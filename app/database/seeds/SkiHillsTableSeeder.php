<?php

class SkiHillsTableSeeder extends Seeder {

  protected $skiHills = [
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
    foreach( $this->skiHills as $skiHill ) {
      DB::table( 'ski_hills' )->insert( ['name' => $skiHill] );
    }
	}

}