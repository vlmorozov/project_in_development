<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRepairStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('repair_state_history', function(Blueprint $table)
		{
			$table->foreign('repair_id', 'FK_repair_state_history_repair_id')->references('id')->on('repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_repair_state_history_repair_state_name')->references('name')->on('repair_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_repair_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('repair_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_repair_state_history_repair_id');
			$table->dropForeign('FK_repair_state_history_repair_state_name');
			$table->dropForeign('FK_repair_state_history_user_id');
		});
	}

}
