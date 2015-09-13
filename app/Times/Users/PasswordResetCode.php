<?php namespace Times\Users;

use Carbon\Carbon;
use Times\Core\Entity;

class PasswordResetCode extends Entity
{
    protected $fillable = ['user_id', 'code'];

    public static function setForUser($userId, $code)
    {
        return static::create([
            'user_id' => $userId,
            'code' => $code
        ]);
    }

    public function hasExpired()
    {
        $created = new Carbon($this->created_at);

        return $created->addMinutes(60) < Carbon::now();
    }

    public function user()
    {
        return $this->belongsTo('\Times\Users\User');
    }
}