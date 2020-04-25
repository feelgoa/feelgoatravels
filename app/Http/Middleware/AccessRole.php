<?php

namespace App\Http\Middleware;

use Illuminate\Http\RedirectResponse;

use Closure;
use Auth;

class AccessRole
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(Auth::check()) {
			return $next($request);
		}

		return response()->json(['status' => 'LOGIN REQUIRED']);
		#return redirect()->action(
		#	'AdminController@login'
		#);

	}
}
