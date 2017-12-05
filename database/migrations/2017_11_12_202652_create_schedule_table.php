<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedule', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vehicle_id')->comment('ID транспортного средства');
			$table->integer('driver_id')->index('FK_schedule_driver_id')->comment('ID водителя');
			$table->integer('shift_id')->nullable()->index('FK_schedule_shift_id')->comment('ID смены');
			$table->date('planning_date')->index('IDX_schedule_planning_date')->comment('Дата планирования');
			$table->unique(['vehicle_id','planning_date','driver_id'], 'UK_schedule_driver');
			$table->unique(['vehicle_id','planning_date','shift_id'], 'UK_schedule');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('schedule');
	}

}
