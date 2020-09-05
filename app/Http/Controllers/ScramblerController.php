<?php

namespace App\Http\Controllers;

use App\Repository\PlayerRepository;
use App\Repository\ScoreRepository;
use App\Repository\ResultRepository;
use App\Traits\ScramblerTrait;
use Illuminate\Http\Request;

class ScramblerController extends Controller
{
    use ScramblerTrait;

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

    public function index(Request $request)
    {
        $request->session()->flush();
        return view('/welcome');

    }
    public function playground(Request $request)
    {
        $scoreRepo  = new ScoreRepository();
        $playerRepo = new PlayerRepository();
        $score = 0;
        $scorePlayer = $scoreRepo->scoreByPlayerId($request->session()->get('player_id'));
        if($scorePlayer)
            $score = $scorePlayer->score;

        return view('/scrambler/playground', [
            'score'     => $score
        ]);
    }

    public function check(Request $request)
    {
        $resultRepo = new ResultRepository();
        $playerRepo = new PlayerRepository();

        $request->validate([
            'original_word' => 'required',
            'form'          => 'required',
        ]);

        $guessWord = $this->queryParamToArray($request->form);
        $message   = 'Awesome! It\'s Correct. The Answer is (' . $request->original_word. ')';
        $status    =  true;
        if($guessWord != $request->original_word){
            $message = "Sorry , It's Incorrect";
            $status  = false;
        }

        $resultRepo->saveResult($request->session()->get('player_id'), $guessWord, $request->original_word, $status);

        return response()->json([
            'error'   => false,
            'message' => $message,
        ], 200);
    }

    public function generate(Request $request)
    {
        $word = $this->generateWord($request);

        return response()->json($word, 200);
    }
}
