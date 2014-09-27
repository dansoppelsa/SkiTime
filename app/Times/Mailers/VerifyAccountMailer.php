<?php namespace Times\Mailers;


use Times\Users\User;

class VerifyAccountMailer {

  protected $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }


  public function send()
  {
    $user = $this->user;
    $data = [
      'name'=> $user->present()->fullName(),
      'link' => url() . '/verify-account/' . $user->verification_code
    ];

    \Mail::send( 'emails.account-verification' , $data, function($message) use ($user)
    {
      $message->to($user->email, $user->present()->fullName())->subject('Welcome to Ski Time');
    });
  }



} 