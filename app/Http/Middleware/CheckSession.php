<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $dataPlayer = [
        //     'username' => $request->session()->get('username'),
        //     'password' => $request->session()->get('password'),
        // ];

        // if ($dataPlayer['username'] == NULL || $dataPlayer['password'] == NULL) {
        //     return redirect('/index');
        // } else {
        //     return redirect('/scrambler/playground');
        // }
        //TODO:fix middleware
        return $next($request);
    }
}
