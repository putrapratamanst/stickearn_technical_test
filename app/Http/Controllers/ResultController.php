<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ResultRepository;

class ResultController extends Controller
{
    public function history(Request $request)
    {
        $scoreRepo = new ResultRepository();
        $getScore  = $scoreRepo->list($request->session()->get('player_id'));

        dd($getScore);
        return view('/result/history',[
            'scores' => $getScore
        ]);
    }
}
