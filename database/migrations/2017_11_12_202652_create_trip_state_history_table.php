<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripStateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_state_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('trip_id')->index('FK_trip_state_trip_id')->comment('ID рейса');
			$table->string('state')->index('FK_trip_state_history_trip_state_name')->comment('Статус');
			$table->integer('user_id')->index('FK_trip_state_user_id')->comment('ID пользователя изменившего статус');
			$table->dateTime('create_date')->comment('Дата и время изменения статуса');
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
		Schema::drop('trip_state_history');
	}

}
