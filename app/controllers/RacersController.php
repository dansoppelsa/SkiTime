<?php

use Times\Racers\RacerDestroyer;

class RacersController extends \BaseController {

  protected $model;

  public function __construct( Times\Racers\Racer $racer )
  {
      $this->model = $racer;
  }


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
		return View::make('racers.add-racer');
	}

	public function store()
	{

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $racer = Times\Racers\Racer::find($id);

        return View::make( 'racers.show' )->with([
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
	    $racer = $this->model->find($id);
        $skiHills = [ "" => "Please Select..." ];
        $skiHills += DB::table( 'ski_hills' )->lists('name', 'id');

        return View::make('racers.edit-racer')->with([
            'racer' => $racer,
            'ski_hills' => $skiHills
        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$racer = $this->model->find($id);
        $racer->fill(Input::all());
        $result = $racer->save();

        return Redirect::to( '/account/edit-racer/' . $id )
            ->withFlashMessage( 'Racer updated.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$racer = Times\Racers\Racer::find($id);
		// If the current user doesn't own the racer record...
		if($racer->user->id !== Auth::user()->id) {
			return Redirect::to('/account');
		}

		$racerDestroyer = new RacerDestroyer;
		$racerDestroyer->destroy($racer);

		return Redirect::to('/account')->withFlashMessage('Racer deleted: ' . $racer->present()->fullName);
	}

}