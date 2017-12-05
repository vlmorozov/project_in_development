<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPaymentConfirmHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payment_confirm_history', function(Blueprint $table)
		{
			$table->foreign('payment_id', 'FK_payment_confirm_history_payment_id')->references('id')->on('payment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_payment_confirm_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payment_confirm_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_payment_confirm_history_payment_id');
			$table->dropForeign('FK_payment_confirm_history_user_id');
		});
	}

}
