<?php namespace Times\Races;

use Times\Core\Entity;
use Eloquent;

class Race extends Entity
{
    protected $table      = 'races';
    protected $hidden     = [''];
    protected $fillable   = ['ski_hill', 'date', 'racer_id'];

    public $presenter = 'Times\Races\RacePresenter';
    public $timestamps = false;

    protected $validationRules = [
        'ski_hill' => 'required',
        'date' => 'required|date',
        'racer_id' => 'required'
    ];


    public function racer()
    {
      return $this->belongsTo('Times\Racers\Racer');
    }

    public function times()
    {
      return $this->hasMany( 'Times\Times\Time' );
    }

    public function getDates()
    {
      return [ 'date' ];
    }

}
