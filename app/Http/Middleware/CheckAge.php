<?php

namespace App\Http\Middleware;

use Closure;

class checkAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $age, $ages)
    {
        if($request->age <= 18) {
            return response()->json("Your age must above 18 years old to view sexy content");
        }
        return $next($request);
    }
}
