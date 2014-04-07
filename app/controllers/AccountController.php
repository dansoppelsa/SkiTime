<?php

class AccountController extends BaseController {

  public function home()
  {
    return View::make( 'account.home' );
  }


    public function addRacer()
    {
        $skiHills = [ "" => "Please Select..." ];
        $skiHills += DB::table( 'ski_hills' )->lists('name');

        return View::make( 'account.add-racer' )
            ->with('ski_hills' , $skiHills);
    }


    public function postAddRacer()
    {
        $input = Input::all();

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

}