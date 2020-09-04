<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
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
    public function form()
    {
        return view('/player/form');
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:player|max:255',
        ]);
        die(json_encode($request));
        die("sdf");
    }
}
