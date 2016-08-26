<?php

namespace App\Http\Controllers;

use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
	
	private $_msg = [
		'add_success'    => '添加应用成功',
		'add_failed'     => '添加应用失败',
		'delete_success' => '删除应用成功',
		'delete_failed'  => '删除应用失败',
		'success'        => 'success',
		'faild'          => 'faild'
	];
	
	/**
	 * 添加 APP
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function create(Request $request)
	{
		
		$this->validate($request, [
			'name'   => 'required',
			'return' => 'required|active_url',
			'notify' => 'required|active_url'
		]);
		
		$user = $this->jwt->authenticate();
		
		$save = (new App())->create([
			'name'   => $request->name,
			'uid'    => $user->id,
			'uuid'   => uniqid('app-', true),
			'remark' => $request->remark,
			'notify' => $request->notify,
			'return' => $request->return
		]);
		
		if ($save)
			return $this->json($this->_msg['add_success']);
		else
			return $this->json($this->_msg['add_failed'], 500);
	}
	
	/**
	 * 编辑 APP
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function edit(Request $request)
	{
		
		$this->validate($request, [
			'name'   => 'required',
			'return' => 'required|active_url',
			'notify' => 'required|active_url'
		]);
		
		$user = $this->jwt->authenticate();
		
		$save = (new App())->fill([
			'name'   => $request->name,
			'uid'    => $user->id,
			'uuid'   => uniqid('app-', true),
			'remark' => $request->remark,
			'notify' => $request->notify,
			'return' => $request->return
		])->saveOrFail();
		
		if ($save)
			return $this->json($this->_msg['add_success']);
		else
			return $this->json($this->_msg['add_failed'], 500);
	}
	
	/**
	 * 删除应用
	 *
	 * @param Request $request
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function delete(Request $request)
	{
		
		$this->validate($request, [
			'id' => 'required|numeric'
		]);
		
		$delete = (new App())->where([
			'id' => $request->id
		])->delete();
		
		if ($delete)
			return $this->json($this->_msg['delete_success']);
		else
			return $this->json(
				$this->_msg['delete_failed'],
				500
			);
	}
	
	/**
	 * 获取应用列表
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function listing()
	{
		return $this->json(
			$this->_msg['success'],
			200,
			(new App())->get()->toArray()
		);
	}
	
}