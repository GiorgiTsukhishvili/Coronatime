<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RememberUser
{
	public function handle(Request $request, Closure $next)
	{
		if (now()->diffInMinutes(session('lastActivityTime')) == config('session.lifetime'))
		{
			Auth::logout();
			return redirect(route('login'));
		}
		return $next($request);
	}
}
