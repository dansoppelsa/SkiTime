<?php

class RacesController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $racer = Times\Racers\Racer::find( Request::segment(3) );
        $skiHills = [ "" => "Please Select..." ];
        $skiHills += DB::table( 'ski_hills' )->lists('name', 'name');

        return View::make('races.create')->with([
            'racer' => $racer,
            'skiHills' => $skiHills
        ]);
	}


	public function store()
	{
        $input = Input::all();

        $raceCreator = new Times\Races\RaceCreator();

        if( ! $race = $raceCreator->create( $input ) )
            return Redirect::to( '/account/racer/' . $input['racer_id'] )
                ->withFlashMessage( 'Error creating race.' . $this->getErrorList() )
                ->withInput();

        return Redirect::to( '/account/racer/' . $input['racer_id'] )
            ->withFlashMessage( 'Race added' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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