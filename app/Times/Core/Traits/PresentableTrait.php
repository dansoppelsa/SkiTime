<?php namespace Times\Core\Traits;

use Times\Core\Exceptions\PresenterNotFoundException;

trait PresentableTrait {

  public function present()
  {
    if( ! $this->presenter or ! class_exists($this->presenter) )
      throw new PresenterNotFoundException('Yo, get your presenter in order son! Ya heard?');

    return new $this->presenter($this);
  }

} 