<?php

namespace App\Http\Middleware;

use App\Models\Scout\PersonalInfo;
use Closure;
use Illuminate\Http\Request;

class SameRegiment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $scout = PersonalInfo::find($request->scoutId);
        if ((auth()->user()->user_type === "admin" && auth()->user()->regiment_id === $scout->regiment_id) || auth()->user()->user_type === "superUser")
        return $next($request);
        return redirect(route('scout.search'));
    }
}
