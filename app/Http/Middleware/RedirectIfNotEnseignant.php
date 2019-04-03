<?php

namespace App\Http\Middleware;
use Closure;

class RedirectIfNotEnseignant
{
	/*
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard="enseignant")
	{
		if(!auth()->guard($guard)->check()) {
			return redirect(route('teacher.login'));
		}
		return $next($request);
	}
}