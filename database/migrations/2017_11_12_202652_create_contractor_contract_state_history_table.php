<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractorContractStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contractor_contract_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('contractor_contract_id')->index('FK_contractor_contract_state_history_contractor_contract_id')->comment('ID договора');
			$table->string('state')->index('FK_contractor_contract_state_history_state')->comment('Статус');
			$table->dateTime('create_datetime')->comment('Дата изменения');
			$table->integer('user_id')->nullable()->index('FK_contractor_contract_state_history_user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('Комментарий к изменению статуса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contractor_contract_state_history');
	}

}
