<?php

namespace App\Http\Middleware;

use Closure;

class CrosMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$response = $next($request);
		
		$response->header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept, Authorization');
		$response->header('Access-Control-Max-Age', 60);
		$response->header('Access-Control-Allow-Origin', '*');
		$response->header('Access-Control-Allow-Methods', 'GET, HEAD, POST, PUT, DELETE');
		
		return $response;
	}
}
