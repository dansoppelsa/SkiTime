<?php

class AuthController extends BaseController {


  public function login()
  {
    return View::make( 'public-site.login' );
  }


  public function postLogin()
  {
    Auth::attempt([ 'email' => Input::get('email'), 'password' => Input::get('password') ]);

    return Redirect::to( '/' );
  }


  public function logout()
  {
    Auth::logout();

    return Redirect::to( '/' )->withFlashMessage('You are now logged out.');
  }

} 