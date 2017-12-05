<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSheetStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sheet_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('sheet_id')->index('FK_sheet_state_history_sheet_id')->comment('ID счета');
			$table->string('state', 50)->index('FK_sheet_state_history_sheet_state_name')->comment('Статус');
			$table->dateTime('create_date')->comment('Дата изменения');
			$table->integer('user_id')->nullable()->index('FK_sheet_state_history_user_id')->comment('ID пользователя');
			$table->string('note')->nullable()->comment('комментарий к изменению статуса');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sheet_state_history');
	}

}
