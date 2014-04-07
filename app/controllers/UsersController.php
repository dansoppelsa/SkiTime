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

    if( ! $userCreator->create( Input::all() ) )
      return Redirect::to( '/sign-up' )
        ->withFlashMessage( 'Errors with input.' . $userCreator->getErrorList() )
        ->withInput();

    return Redirect::to( '/login' )
      ->withFlashMessage( 'User Created' );
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

}