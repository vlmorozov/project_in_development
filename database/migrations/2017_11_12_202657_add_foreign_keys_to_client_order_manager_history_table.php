<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientOrderManagerHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_order_manager_history', function(Blueprint $table)
		{
			$table->foreign('client_order_id', 'FK_client_order_manager_history_client_order_id')->references('id')->on('client_order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('manager_id', 'FK_client_order_manager_history_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_client_order_manager_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_order_manager_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_client_order_manager_history_client_order_id');
			$table->dropForeign('FK_client_order_manager_history_manager_id');
			$table->dropForeign('FK_client_order_manager_history_user_id');
		});
	}

}
