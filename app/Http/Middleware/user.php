<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=\Illuminate\Support\Facades\Auth::user();
        if ($user) {
            return $next($request);
        }
        return \response()->json(['data'=>'No'],403);
    }
}
