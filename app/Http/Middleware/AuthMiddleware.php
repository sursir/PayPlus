<?php

namespace App\Http\Middleware;

use Illuminate\Session\TokenMismatchException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;
use Closure;

class AuthMiddleware
{
	
	private $_jwt;
	
	
	public function __construct(JWTAuth $jwt)
	{
		$this->_jwt = $jwt;
	}
	
	public function handle($request, Closure $next)
	{
		
		if (!$this->_jwt->parser()->setRequest($request)->hasToken()) {
			return response()->json([
				'code' => 404,
				'msg'  => 'Token not provided'
			], 401);
		}
		
		try {
			$this->_jwt->parseToken()->authenticate();
		} catch (TokenBlacklistedException $e) {
			return response()->json([
				'code' => $e->getCode(),
				'msg'  => $e->getMessage()
			], 401);
		} catch (TokenExpiredException $e) {
			return response()->json([
				'code' => $e->getCode(),
				'msg'  => $e->getMessage()
			], 401);
		} catch (TokenInvalidException $e) {
			return response()->json([
				'code' => $e->getCode(),
				'msg'  => $e->getMessage()
			], 401);
		} catch (TokenMismatchException $e) {
			return response()->json([
				'code' => $e->getCode(),
				'msg'  => $e->getMessage()
			], 401);
		} catch (JWTException $e) {
			return response()->json([
				'code' => $e->getCode(),
				'msg'  => $e->getMessage()
			], 401);
		}
		
		return $next($request);
		
	}
	
}