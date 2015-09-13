<?php namespace Times\Users;

class PasswordResetCodeGenerator
{
    public function generateUnique()
    {
        $result = null;

        do {
            $code = $this->getCode();
            $result = PasswordResetCode::where('code', '=', $code)->first();
        } while ($result !== null);

        return $code;
    }

    protected function getCode()
    {
        return md5(time());
    }
}
