<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_id')->index('FK_repair_state_history_repair_id')->comment('ID заявки на ремонт');
			$table->string('state')->index('FK_repair_state_history_repair_state_name')->comment('Статус');
			$table->dateTime('create_datetime')->comment('Дата изменения');
			$table->integer('create_user_id')->index('FK_repair_state_history_user_id')->comment('ID пользователя');
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
		Schema::drop('repair_state_history');
	}

}
