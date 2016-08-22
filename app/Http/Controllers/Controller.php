<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Manager;

class Controller extends BaseController
{
	/**
	 * @var JWTAuth
	 */
	protected $jwt;
	
	/**
	 * @var Manager
	 */
	protected $manager;
	
	/**
	 * Controller constructor.
	 *
	 * @param JWTAuth $jwt
	 * @param Manager $manager
	 */
	public function __construct(JWTAuth $jwt, Manager $manager)
	{
		$this->jwt = $jwt;
		$this->manager = $manager;
	}
	
	/**
	 * 返回 JSON
	 *
	 * @param array  $resp 数据包体
	 * @param int    $code 状态码
	 * @param string $msg 消息
	 * @param array  $headers 附加头
	 * @param int  $options 可选项
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function json(array $resp = [],
						 $code = 200,
						 $msg = '',
						 $headers = [],
						 $options = 0)
	{
		
		return response()->json([
			'code' => $code,
			'msg'  => $msg,
			'resp' => $resp
		], $code, $headers, $options);
		
	}
	
}
