<?php

namespace App\Traits;

/**
 * 
 */
trait PlayerTrait
{
    public static function setSessionPlayer($data)
    {
        session([
            'username' => $data->username,
            'password' => $data->password
        ]);
    }
}
