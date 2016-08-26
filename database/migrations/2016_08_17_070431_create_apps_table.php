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
			$table->uuid('uuid')->index('idx_uuid');
			$table->string('name');
			$table->string('notify');
			$table->string('return');
			$table->string('remark');
			$table->timestamps();
			$table->softDeletes();
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
