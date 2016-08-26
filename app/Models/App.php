<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model {
	
	/**
	 * 禁止更新的字段
	 *
	 * @var array
	 */
	protected $guarded = [
		'updated_at',
		'created_at',
		'deleted_at'
	];
	
	/**
	 * 隐藏字段
	 *
	 * @var array
	 */
	protected $hidden = [
		'deleted_at'
	];
}