<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use Carbon\Carbon;

use Cache;

class LastUserActivity
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
        if(Auth::check())
        {
            $expireAt = Carbon::now()->addMinute(2);
            Cache::put('user-is-online-'.Auth::user()->id,true,$expireAt);
        }
        return $next($request);
    }
}
