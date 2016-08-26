<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
	
	private $_lang = [
		'signin_incorrect' => '用户名或密码错误',
		'token_incorrect'  => 'TOKEN 验证失败',
		'signout_success'  => '退出登陆成功',
		'signout_error'    => '退出登陆失败'
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
				return $this->json(
					'登陆成功',
					200,
					['token' => $token]
				);
			}
			
			return $this->json($this->_lang['signin_incorrect'], 403);
			
		} catch (JWTException $e) {
			return $this->json($e->getMessage(), 500);
		}
		
	}
	
	/**
	 * 退出登录
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function signout()
	{
		try {
			
			if ($this->manager->invalidate($this->jwt->getToken())) {
				return $this->json('登陆成功', 200, [
					'token' => $this->_lang['signout_success']
				]);
			}
			
			return $this->json([
				'token' => $this->_lang['signout_failed']
			]);
			
			
		} catch (JWTException $e) {
			return $this->json($e->getMessage(), 500);
		}
	}
	
	/**
	 * 刷新 TOKEN
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function refresh()
	{
		try {
			
			return $this->json([
				'token' => $this->manager->refresh($this->jwt->getToken())->get()
			]);
			
		} catch (JWTException $e) {
			return $this->json($e->getMessage(), 500);
		}
	}
	
	/**
	 * 待定
	 */
	public function retrieve()
	{
		
	}
	
}
