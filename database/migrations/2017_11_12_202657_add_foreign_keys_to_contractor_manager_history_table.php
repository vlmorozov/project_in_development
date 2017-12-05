<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorManagerHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_manager_history', function(Blueprint $table)
		{
			$table->foreign('manager_id', 'FK_contractor_manager_history_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('contractor_id', 'FK_contractor_manager_history_old_contractor_id')->references('id')->on('contractor')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('old_manager_id', 'FK_contractor_manager_history_old_manager_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_contractor_manager_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_manager_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_manager_history_manager_id');
			$table->dropForeign('FK_contractor_manager_history_old_contractor_id');
			$table->dropForeign('FK_contractor_manager_history_old_manager_id');
			$table->dropForeign('FK_contractor_manager_history_user_id');
		});
	}

}
