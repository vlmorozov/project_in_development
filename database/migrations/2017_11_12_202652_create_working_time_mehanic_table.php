<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkingTimeMehanicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('working_time_mehanic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('FK_working_time_mehanic_user_id')->comment('ID сотрудника');
			$table->date('planning_date')->comment('Дата');
			$table->integer('shift_id')->nullable()->index('FK_working_time_mehanic_shift_mechanic_id')->comment('ID смены');
			$table->integer('time_plan')->nullable()->comment('Запланированное время (ч)');
			$table->integer('time_fact')->nullable()->comment('Отработанное время (ч)');
			$table->string('note')->nullable()->comment('Комментарий');
			$table->enum('status', array('1','2'))->default('1')->comment('1 - активен, 2 - не активен');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('working_time_mehanic');
	}

}
