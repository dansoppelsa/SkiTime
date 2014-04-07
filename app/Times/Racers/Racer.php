<?php namespace Times\Racers;


use Times\Core\Entity;
use Eloquent;

class Racer extends Entity
{
    protected $table      = 'racers';
    protected $hidden     = ['user_id'];
    protected $fillable   = ['first_name', 'last_name', 'dob' , 'home_ski_hill'];

    public $timestamps = false;

    public $presenter = 'Times\Racers\RacerPresenter';

    protected $validationRules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'dob' => 'required'
    ];


    public function user()
    {
      return $this->belongsTo('Times\Users\User');
    }

    public function races()
    {
      return $this->hasMany( 'Times\Races\Race' );
    }

    public function getDates()
    {
      return [ 'dob' ];
    }


}
