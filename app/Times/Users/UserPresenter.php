<?php namespace Times\Users;

use HTML;
use Times\Core\Presenter;

class UserPresenter extends Presenter
{

  public function fullName()
  {
    return $this->entity->first_name . " " . $this->entity->last_name;
  }

  public function paid()
  {
    return $this->entity->paid ? "Yes" : "No";
  }
}