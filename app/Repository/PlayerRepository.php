<?php

namespace App\Repository;

use App\Models\Player;

class PlayerRepository
{
    public static function createPlayer($request)
    {
        $model           = new Player();
        $model->username = $request->username;
        $model->password = $request->password;
        $model->save();

        return $model;
    }

    public static function detailPlayer($username, $password)
    {
        return Player::where(['username' => $username])
            ->where(['password' => $password])
            ->first();
    }
}
