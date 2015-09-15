<?php

use Times\Users\User;
use Times\Users\PasswordResetCodeGenerator;
use Times\Users\PasswordResetCode;

class AccountController extends BaseController {

    public function home()
  {
    return View::make( 'account.home' );
  }

    public function addRacer()
    {
        $skiHills = [ "" => "Please Select..." ];
        $skiHills += DB::table( 'ski_hills' )->lists('name', 'id');

        return View::make( 'account.add-racer' )
            ->with('ski_hills' , $skiHills);
    }

    public function postAddRacer()
    {
        $input = Input::all();

        if(Auth::user()->racers->count() >= 4){
            return Redirect::to('https://www.youtube.com/watch?v=dQw4w9WgXcQ?autoplay=1');
        }

        $racerCreator = new Times\Racers\RacerCreator();
        $racerCreator->linkToUser( Auth::user()->id );

        if( ! $racer = $racerCreator->create( $input ) )
          return Redirect::to( '/account/add-racer' )
            ->withFlashMessage( 'Error creating racer.' . $this->getErrorList() )
            ->withInput();

        return Redirect::to( '/account' )
          ->withFlashMessage( 'Racer added' );
    }

    public function instructions()
    {
        return View::make( 'account.instructions' );
    }

    public function forgotPassword()
    {
        return View::make('account.forgot-password');
    }

    public function postForgotPassword()
    {
        $email = Input::get('email');
        $user = User::where('email', '=', $email)->first();

        if($user === null) {
            return Redirect::to('forgot-password-email-sent');
        }

        // Delete any codes that already belong to this user
        if($user->hasPasswordResetCode()) {
            $user->passwordResetCode->delete();
        }

        // Save code in database
        $passwordResetCodeGenerator = new PasswordResetCodeGenerator;
        $code = $passwordResetCodeGenerator->generateUnique();
        PasswordResetCode::setForUser($user->id, $code);

        // Send the email
        $mailer = new \Times\Mailers\PasswordResetMailer($user, $code);
        $mailer->send();

        // Redirect back
        return Redirect::to('forgot-password-email-sent');
    }

    public function forgotPasswordEmailSent()
    {
        return View::make('account.forgot-password-email-sent');
    }

    public function resetPassword($code)
    {
        return View::make('account.reset-password')->with('code', $code);
    }

    public function postResetPassword()
    {
        $code = Input::get('code');
        $password1 = Input::get('password1');
        $password2 = Input::get('password2');

        // Does the code exist and valid (not expired)
        $code = PasswordResetCode::where('code', '=', $code)->first();
        if($code === null) {
            return Redirect::to('/');
        }

        if($code->hasExpired()) {
            return Redirect::to('/login')->withFlashMessage('Password Reset Token Expired.');
        }

        // Do the passwords match?
        if($password1 !== $password2) {
            return Redirect::to('reset-password/' . $code->code)->withFlashMessage('Passwords do not match');
        }

        $user = $code->user;
        $user->password = Hash::make($password1);
        $user->save();

        $code->delete();

        return Redirect::to('/login')->withFlashMessage('Password reset successfully. Login to your account.');
    }

    public function edit()
    {
        $user = Auth::user();

        return View::make('account.edit')->with([
            'account' => $user
        ]);
    }
}