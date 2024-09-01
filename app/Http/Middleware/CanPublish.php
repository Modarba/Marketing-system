<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CanPublish
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $page_id=$request->route('id');
        $user_id=$request->input('user_id');
        if (!Page::find($page_id)->user->contains($user_id))
        {
            return \response()->json(['message'=>'The user is not a member of this page.'],403);
        }
        return $next($request);
    }
}
