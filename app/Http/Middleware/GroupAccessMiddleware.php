<?php

namespace App\Http\Middleware;

use Closure;
use App\Group;
use Illuminate\Support\Facades\Auth;
class GroupAccessMiddleware
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
        return $next($request);
    }
}
