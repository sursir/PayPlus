<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
	
	private $_lang = [
		'signin_incorrect' => '用户名或密码错误',
		'token_incorrect' => 'TOKEN 验证失败'
	];
	
	
	/**
	 * 登陆
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function signin(Request $request)
	{
		$this->validate($request, [
			'email'    => 'required|email|max:255',
			'password' => 'required'
		]);
		
		try {
			
			if ($token = $this->jwt->attempt($request->only(['email', 'password']))) {
				return $this->json([
					'token' => $token
				]);
			}
			
			return $this->json([], 403, $this->_lang['signin_incorrect']);
			
		} catch (JWTException $e) {
			return $this->json([], 500, $e->getMessage());
		}
		
	}
	
	public function signup()
	{
		
	}
	
	public function signout()
	{
		
	}
	
	public function refresh()
	{
		try {

			return $this->json([
				'token' => $this->jwt->refresh()
			]);

		} catch (JWTException $e) {
			return $this->json([], 500, $e->getMessage());
		}
	}
	
	public function retrieve()
	{
		
	}
	
}
