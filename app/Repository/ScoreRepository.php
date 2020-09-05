<?php

namespace App\Repository;

use App\Models\Score;

class ScoreRepository
{
    public static function scoreByPlayerId($playerId)
    {
        return Score::where('player_id', $playerId)
            ->first();
    }


    public static function saveScore($playerId, $status)
    {
        $score = $status == true ? 1 : -1;
        $model             = new Score();
        $model->player_id  = $playerId;
        $model->score      = $score;

        $model->save();
    }

    public static function updateScore($playerId, $status)
    {
        $detail = self::scoreByPlayerId($playerId);
        $score  = $status == true ? $detail['score']+1 : $detail['score']+(-1);
        $detail->score = $score;
        $detail->save();


    }
}
