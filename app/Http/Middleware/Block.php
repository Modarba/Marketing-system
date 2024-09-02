<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Block
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user=\Illuminate\Support\Facades\Auth::user();
        $r=$request->route('user_id');
        if ($r)
        {
            abort(403,'you cant see Page');
        }else if ($r!=$user->id){
                return $next($request);
        }

    }
}
