<?php

namespace App\Http\Middleware;
use Closure;

class RedirectIfNotEtudiant
{
	/*
	 _ Handle an incoming request.
	 _
	 _ @param  \Illuminate\Http\Request  $request
	 _ @param  \Closure  $next
	 _ @return mixed
	 */
	public function handle($request, Closure $next, $guard="etudiant")
	{
		if(!auth()->guard($guard)->check()) {
			return redirect(route('student.login'));
		}
		return $next($request);
	}
}