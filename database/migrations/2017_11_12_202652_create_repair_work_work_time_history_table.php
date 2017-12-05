<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepairWorkWorkTimeHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repair_work_work_time_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('repair_work_id')->index('FK_repair_work_time_repair_work_id')->comment('ID вида работ');
			$table->float('old_work_time', 10, 0)->nullable()->comment('Старое значение н/ч');
			$table->float('work_time', 10, 0)->nullable()->comment('Новое значение н/ч');
			$table->integer('create_user_id')->comment('ID пользователя');
			$table->dateTime('create_datetime')->comment('Дата и время изменения');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('repair_work_work_time_history');
	}

}
