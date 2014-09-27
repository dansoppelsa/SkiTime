<?php

class UsersController extends \BaseController {

  protected $model;

  public function __construct( Times\Users\User $user )
  {
      $this->model = $user;
  }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  $users = $this->model->all();

    return View::make( 'users' )->withUsers($users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	public function store()
	{
	  $userCreator = new Times\Users\UserCreator();

    if( ! $user = $userCreator->create( Input::all() ) )
      return Redirect::to( '/sign-up' )
        ->withFlashMessage( 'Errors with input.' . $userCreator->getErrorList() )
        ->withInput();

    $verificationCode = new \Times\Users\VerificationCode();

    $user->verification_code = $verificationCode->generateUnique();
    $user->verified = '0';
    $user->save();

    // Send the email
    $mailer = new \Times\Mailers\VerifyAccountMailer($user);
    $mailer->send();


    return Redirect::to( '/login' )
      ->withFlashMessage( 'User Account Created. YOU ARE NOT DONE YET! Please CHECK YOUR EMAIL for a verification message in order to verify your account.' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



  public function verifyAccount($verificationCode)
  {
    $user = Times\Users\User::where('verification_code', '=' , $verificationCode)->first();

    if( ! $user )
      return Redirect::to('/');

    $user->verified = 1;
    $user->save();

    return View::make( 'public-site.verify-account' )->with([
      'user' => $user
    ]);
  }

}