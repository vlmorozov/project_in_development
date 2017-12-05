<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentConfirmHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_confirm_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('payment_id')->index('FK_payment_confirm_history_payment_id');
			$table->boolean('is_confirm')->default(0);
			$table->dateTime('create_datetime');
			$table->integer('user_id')->index('FK_payment_confirm_history_user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_confirm_history');
	}

}
