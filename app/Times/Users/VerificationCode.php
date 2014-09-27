<?php namespace Times\Users;


class VerificationCode {

  protected $model = 'Times\Users\User';

  public function __construct()
  {

  }


  public function generateUnique()
  {
    $result = null;

    do {
      $code = $this->getCode();
      $result = User::where('verification_code', '=' , $code)->first();
    } while( $result !== null );

    return $code;
  }



  protected function getCode()
  {
    return md5( time() );
  }



}