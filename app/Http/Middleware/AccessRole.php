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
		/*
		if(Auth::check()) {
			return $next($request);
		}
		return redirect()->action(
			'AdminController@login'
		);
		*/
        if (!$request->session()->exists('user')) {
            // user value cannot be found in session
            return redirect(ADMIN_URL.ADMIN_LOGIN_PAGE_URL);
        }

        return $next($request);
	}
}
