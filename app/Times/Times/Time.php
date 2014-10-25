<?php namespace Times\Times;

use Times\Core\Entity;
use Eloquent;

class Time extends Entity
{
    protected $table      = 'times';
    protected $hidden     = [''];
    protected $fillable   = [ 'time', 'race_id'];

    public $presenter = 'Times\Time\TimePresenter';

    public $timestamps = false;

    protected $validationRules = [
        'time' => 'required',
        'race_id' => 'required'
    ];


    public function race()
    {
      return $this->belongsTo('Times\Races\Race');
    }

}
