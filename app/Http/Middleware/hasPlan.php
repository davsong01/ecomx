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

        if (auth()->user()->plan_id != NULL && auth()->user()->level == 1 && (auth()->user()->plan_expiry < now())) {
            $title = 'Purchase plan';
            
            return redirect(route('plan.upgrade', auth()->user()->plan_id));
        }

        return $next($request);
    }
}
