<?php

namespace App\Http\Controllers;

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
        $dataPlayer = [
            'username' => $request->session()->get('username'),
            'password' => $request->session()->get('password'),
        ];

        return view('/scramble/playground', [
            'dataPlayer' => $dataPlayer
        ]);
    }
}
