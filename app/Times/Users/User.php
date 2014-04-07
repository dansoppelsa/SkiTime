<?php namespace Times\Users;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Times\Core\Entity;
use Eloquent;


class User extends Entity implements UserInterface, RemindableInterface
{
    protected $table = 'users';
    protected $hidden = ['password'];
    protected $fillable = ['first_name', 'last_name', 'email', 'paid'];
    protected $visible = ['first_name', 'last_name', 'email', 'paid'];

    protected $presenter = 'Times\Users\UserPresenter';

    protected $validationRules = [
        'email' => 'unique:users,email,<id>',
        'first_name' => 'required',
        'last_name' => 'required',
    ];

    public function racers()
    {
      return $this->hasMany('Times\Racers\Racer');
    }

    public function getDates()
  {
    return [ 'created_at' , 'updated_at' ];
  }


/** Interface Functions */


    // UserInterface
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }


    public function getAuthPassword()
    {
        return $this->password;
    }


    // RemindableInterface
    public function getReminderEmail()
    {
        return $this->email;
    }

}
