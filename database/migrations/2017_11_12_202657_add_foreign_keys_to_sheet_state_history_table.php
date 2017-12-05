<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSheetStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sheet_state_history', function(Blueprint $table)
		{
			$table->foreign('sheet_id', 'FK_sheet_state_history_sheet_id')->references('id')->on('sheet')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_sheet_state_history_sheet_state_name')->references('name')->on('sheet_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_sheet_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sheet_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_sheet_state_history_sheet_id');
			$table->dropForeign('FK_sheet_state_history_sheet_state_name');
			$table->dropForeign('FK_sheet_state_history_user_id');
		});
	}

}
