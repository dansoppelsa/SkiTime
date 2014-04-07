<?php namespace Times\Racers;

use Times\Core\Creator;

class RacerCreator extends Creator {

  protected $entity = 'Times\Racers\Racer';

  public function linkToUser( $userID )
  {
    $this->entity->user_id = $userID;
  }


} 