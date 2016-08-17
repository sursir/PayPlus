<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('app_id')->index('idx_app_id');
			$table->uuid('transaction');
			$table->string('out_trade_no')->unique();
			$table->string('name');
			$table->decimal('amount');
			$table->string('notify');
			$table->string('return');
			$table->integer('gateway')->unsigned();
			$table->tinyInteger('notified');
			$table->timestamp('notified_at');
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
        Schema::dropIfExists('transactions');
    }
}
