<?php

namespace App\Http\Middleware;
use Closure;

class RedirectIfNotEncryptor
{
	/*
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard="encryptor")
	{
		if(!auth()->guard($guard)->check()) {
			return redirect(route('encryptor.login'));
		}
		return $next($request);
	}
}