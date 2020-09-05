<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ScoreRepository;

class ScoreController extends Controller
{
    public function getscore(Request $request)
    {
        $scoreRepo = new ScoreRepository();
        $getScore  = $scoreRepo->scoreByPlayerId($request->session()->get('player_id'));

        return response()->json($getScore['score'] ?? 0, 200);
    }
}
