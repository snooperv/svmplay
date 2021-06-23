<?php

namespace App\Http\Middleware\Statuses;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterOrAdminOnlyMiddleware
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
        if (!(Auth::user()->role == 'MASTER'
            || Auth::user()->role == 'ADMIN')) {
            redirect('/home');
        }
        return $next($request);
    }
}
