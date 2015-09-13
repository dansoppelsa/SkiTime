<?php namespace Times\Mailers;


use Times\Users\User;

class PasswordResetMailer
{
    protected $user;
    protected $passwordResetCode;

    public function __construct(User $user, $passwordResetCode)
    {
        $this->user = $user;
        $this->passwordResetCode = $passwordResetCode;
    }

    public function send()
    {
        $user = $this->user;
        $data = [
            'name' => $user->present()->fullName(),
            'link' => url() . '/reset-password/' . $this->passwordResetCode
        ];

        \Mail::send('emails.password-reset', $data, function ($message) use ($user) {
            $message->to($user->email, $user->present()->fullName())->subject('Forgot Your Password?');
        });
    }

}
