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
    public function form()
    {
        return view('/player/form');
    }

    public function create(Request $request)
    {
        $repository = new PlayerRepository();
        $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);
        session(['key' => 'value']);

        $dataPlayer = $repository->detailPlayer($request->username, $request->password);
        if(!$dataPlayer)
            $dataPlayer = $repository->createPlayer($request);
        
        $this->setSessionPlayer($dataPlayer);
        
        return redirect('/scrambler/playground');
    }
}
