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
	public function show($racerId, $raceId)
	{
        $race = Times\Races\Race::find($raceId);
        $racer = Times\Racers\Racer::find($racerId);

        return View::make( 'races.show' )->with([
            'race' => $race,
            'racer' => $racer
        ]);
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
        $race = Times\Races\Race::find(Input::get('race_id'));

        if( $race->hasTimes() ) {

            $time1 = $race->times->get(0);
            $time1->time = Input::get('run_1');
            $time1->save();

            $time2 = $race->times->get(1);
            $time2->time = Input::get('run_2');
            $time2->save();
        }
        else {
            $time1 = new \Times\Times\Time();
            $time1->time = Input::get('run_1');
            $time1->race_id = $race->id;
            $time1->save();

            $time2 = new \Times\Times\Time();
            $time2->time = Input::get('run_2');
            $time2->race_id = $race->id;
            $time2->save();
        }

        $race->finishing_place = Input::get('finishing_place');
        $race->save();

		return Redirect::to( '/account/racer/' . $race->racer_id . '/race/' . $race->id )
            ->withFlashMessage('Race Times saved.');
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