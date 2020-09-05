<?php

namespace App\Http\Controllers;

use App\Repository\PlayerRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $repository = new PlayerRepository();
        $lists       = $repository->listPlayer();

        return view('/home', [
            'lists' => $lists
        ]);

    }
}
