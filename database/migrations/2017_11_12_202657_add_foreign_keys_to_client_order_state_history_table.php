<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientOrderStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_order_state_history', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_client_order_state_history_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_client_order_state_history_client_order_state_name')->references('name')->on('client_order_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_client_order_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_order_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_client_order_state_history_client_order_id');
			$table->dropForeign('FK_client_order_state_history_client_order_state_name');
			$table->dropForeign('FK_client_order_state_history_user_id');
		});
	}

}
