<?php namespace Times\Racers;

use Times\Core\Creator;

class RacerCreator extends Creator {

  protected $entity = 'Times\Racers\Racer';

  public function linkToUser( $userID )
  {
    $this->entity->user_id = $userID;
  }

    public function create( $data )
    {
        $racer = parent::create($data);

        $racer->home_ski_hill = \Times\SkiHills\SkiHill::find( $data['home_ski_hill'] )->name;
        return $racer->save();
    }

} 