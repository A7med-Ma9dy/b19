<?php

namespace App\Http\Middleware;

use App\Traits\ApiTrait;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdminVerification
{
    use ApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$guard)
    {
        if(! Auth::guard($guard)->check()){
            // user not authenticated
            return $this->errorResponse(['admin'=>'Unauthenticated'],"Failed Attempt",401);
        }
        if(is_null($request->user($guard)->email_verified_at)){
            // not verified
            return $this->errorResponse(['admin'=>'Not Verified'],"Failed Attempt",401);

        }
        return $next($request);
    }
}
