<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToContractorContractStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contractor_contract_state_history', function(Blueprint $table)
		{
			$table->foreign('contractor_contract_id', 'FK_contractor_contract_state_history_contractor_contract_id')->references('id')->on('contractor_contract')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_contractor_contract_state_history_state')->references('name')->on('contractor_contract_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_contractor_contract_state_history_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contractor_contract_state_history', function(Blueprint $table)
		{
			$table->dropForeign('FK_contractor_contract_state_history_contractor_contract_id');
			$table->dropForeign('FK_contractor_contract_state_history_state');
			$table->dropForeign('FK_contractor_contract_state_history_user_id');
		});
	}

}
