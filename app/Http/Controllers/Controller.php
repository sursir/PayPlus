<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Tymon\JWTAuth\JWTAuth;

class Controller extends BaseController
{
	/**
	 * @var JWTAuth
	 */
	protected $jwt;

	
	/**
	 * Controller constructor.
	 *
	 * @param JWTAuth $jwt
	 */
	public function __construct(JWTAuth $jwt)
	{
		$this->jwt = $jwt;
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
