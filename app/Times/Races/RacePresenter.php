<?php namespace Times\Races;

use Times\Core\Presenter;

class RacePresenter extends Presenter
{

  public function ski_hill()
  {
    return ucwords(strtolower($this->entity->ski_hill));
  }


  public function skiHill()
  {
    return $this->ski_hill();
  }


}