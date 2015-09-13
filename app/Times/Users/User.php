<?php namespace Times\Users;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Times\Core\Entity;
use Eloquent;
use Times\Core\Exceptions\PresenterNotFoundException;


class User extends Entity implements UserInterface, RemindableInterface
{
    protected $table = 'users';
    protected $hidden = [];
    protected $fillable = ['first_name', 'last_name', 'email', 'paid', 'password'];
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
        return ['created_at', 'updated_at'];
    }

    public function isPaid()
    {
        return $this->paid == 1;
    }

    public function markAsPaid()
    {
        $this->paid = 1;
        $this->save();
    }

    public function passwordResetCode()
    {
        return $this->hasOne('\Times\Users\PasswordResetCode');
    }

    public function hasPasswordResetCode()
    {
        return $this->passwordResetCode !== null;
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

    // RemindableInterfacea
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
