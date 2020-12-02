<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\CalculationController;

class EnsureSessionData 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $c = new CalculationController;
        $c->ensureCalculationDataInSession(); 

        return $next($request);
    }
}
