<?php

namespace App\Repository;

use App\Models\Score;

class ScoreRepository
{
    public static function scoreByPlayerId($idPlayer)
    {
        return Score::where(['player_id' => $idPlayer])
            ->first();
    }
}
