<?php

class AuthController extends BaseController
{

    public function login()
    {
        return View::make('public-site.login');
    }

    public function postLogin()
    {
        $loggedInSuccessfully = Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]);

        if (!$loggedInSuccessfully) {
            return Redirect::to('/login')->withFlashMessage('Incorrect Username or Password.');
        }

        return Redirect::to('/account');
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/')->withFlashMessage('You are now logged out.');
    }
}
