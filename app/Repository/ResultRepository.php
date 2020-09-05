<?php

namespace App\Repository;

use App\Models\Result;

class ResultRepository
{
    public static function resultByPlayerId($idPlayer, $word)
    {
        return Result::where('player_id', $idPlayer)
            ->where('original_word', $word)
            ->first();
    }
    public static function list($idPlayer)
    {
        return Result::where('player_id', $idPlayer)
            ->orderByDesc('id')
            ->get();
    }

    public static function saveResult($playerId, $guessWord, $originalWord, $scrambleWord, $status)
    {
        $model                 = new Result();
        $model->player_id      = $playerId;
        $model->answer         = $guessWord;
        $model->scramble_word  = $scrambleWord;
        $model->original_word  = $originalWord;
        $model->status         = $status;

        $model->save();
    }
}
