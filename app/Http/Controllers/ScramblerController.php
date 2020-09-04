<?php

namespace App\Http\Controllers;

use App\Repository\PlayerRepository;
use App\Repository\ScoreRepository;
use Illuminate\Http\Request;

class ScramblerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function playground(Request $request)
    {
        $scoreRepo  = new ScoreRepository();
        $playerRepo = new PlayerRepository();
        $dataPlayer = [
            'username' => $request->session()->get('username'),
            'password' => $request->session()->get('password'),
        ];

        $dataPlayer = $playerRepo->detailPlayer($dataPlayer['username'], $dataPlayer['password']);
        $score = 0;
        $scorePlayer = $scoreRepo->scoreByPlayerId($dataPlayer->id);
        if($scorePlayer)
            $score = $scorePlayer->score;

        return view('/scrambler/playground', [
            'dataPlayer' => $dataPlayer,
            'score'     => $score
        ]);
    }

    public function check(Request $request)
    {
        echo "<pre>";
        die(print_r($request->all()));
    }

    public function generate(Request $request)
    {
        return response()->json(array('word' => "INI WORD"), 200);

        echo "<pre>";
        die(print_r($request->all()));
    }
}
