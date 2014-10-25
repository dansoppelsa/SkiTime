<?php namespace Times\Racers;

use Times\Core\Presenter;

class RacerPresenter extends Presenter
{

    public function fullName()
    {
        return $this->entity->first_name . " " . $this->entity->last_name;
    }

    public function slug()
    {
        return str_replace([" ", "\'"],["-", ""], strtolower($this->fullName()));
    }


    public function birthDate()
    {
        return date("F j, Y" , strtotime($this->entity->dob));
    }

    public function homeSkiHill()
    {
        return $this->entity->home_ski_hill;
    }
}