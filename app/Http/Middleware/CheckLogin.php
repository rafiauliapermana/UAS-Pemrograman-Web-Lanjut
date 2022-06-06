<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }
        $user = Auth::user();
        if ($user->level == $level || $user->level == 'admin')
            return $next($request);

        return redirect('masuk')->with('error', "Akses ditolak.");
    }
}
