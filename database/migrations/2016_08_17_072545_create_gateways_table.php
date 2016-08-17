<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatewaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gateways', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name'); //接口名称
			$table->string('description'); //接口描述
			$table->integer('currency'); //货币
			$table->json('configuration'); //配置信息存 JSON
			$table->tinyInteger('status'); //状态 0:不可用 1:可用
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
        Schema::dropIfExists('gateways');
    }
}
