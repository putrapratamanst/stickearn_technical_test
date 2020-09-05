<?php

namespace App\Http\Controllers;

use App\Repository\PlayerRepository;
use App\Traits\PlayerTrait;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    use PlayerTrait;
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
    public function form(Request $request)
    {
        return view('/player/form');
    }

    public function create(Request $request)
    {
        $repository = new PlayerRepository();
        $validator = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        $dataPlayer = $repository->detailPlayerByUsername($request->username);
        if($dataPlayer){
            $dataPlayerCheckPassowrd = $repository->detailPlayer($request->username, $request->password);
            if(!$dataPlayerCheckPassowrd){
                return view('/player/form')->withErrors(['', 'Data Player Not Found ']);
            }
        } else {
            $dataPlayer = $repository->createPlayer($request);
        }
        
        $this->setSessionPlayer($dataPlayer);
        
        return redirect('/scrambler/playground');
    }
}
