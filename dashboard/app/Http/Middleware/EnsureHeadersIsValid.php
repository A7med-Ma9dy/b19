<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class EnsureHeadersIsValid
{
    use ApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->expectsJson()){
            return $this->errorResponse(['accept'=>'Must be application/json'],"Accept Key Is Missed");
        }
        return $next($request);
    }
}
