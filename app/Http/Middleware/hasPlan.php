<?php

namespace App\Http\Middleware;

use auth;
use Closure;

class hasPlan
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
        if (auth()->user()->plan_id == NULL && auth()->user()->level == 1 ) {
            $title = 'Purchase plan';
            
            return redirect(url('/selectplans'));
        }

        return $next($request);
    }
}
