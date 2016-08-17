<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apps', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('uid')->index('idx_uid');
			$table->string('name');
			$table->string('remark');
			$table->string('secret')->unique()->index('idx_app_secret');
			$table->string('token')->unqiue()->index('idx_app_token');
			$table->softDeletes();
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('apps');
	}
}
