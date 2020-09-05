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
            'player_id' => $data->id,
            'username' => $data->username,
            'password' => $data->password
        ]);
    }
}
