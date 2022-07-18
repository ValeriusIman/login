<?php


namespace App\Helper;


class Helper
{
    /**
     * Function to check is the user already login or not.
     *
     * @return boolean
     */
    public function isLogin(): bool
    {
        return (session('user') !== null);
    }


    /**
     * Function to get user id
     *
     * @return bool
     */
    public function isSet(): bool
    {
        return !empty(session('user'));
    }
}
