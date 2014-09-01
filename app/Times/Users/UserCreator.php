<?php namespace Times\Users;

use Times\Core\Creator;

class UserCreator extends Creator {

  protected $entity = 'Times\Users\User';

  public function create( $data )
  {
    $user = parent::create($data);

    $user->password = \Hash::make($user->password);
    $user->save();

    return $user;
  }

} 