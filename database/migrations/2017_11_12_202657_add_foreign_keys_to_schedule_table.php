<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'FK_schedule_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('shift_id', 'FK_schedule_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_schedule_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedule', function(Blueprint $table)
		{
			$table->dropForeign('FK_schedule_driver_id');
			$table->dropForeign('FK_schedule_shift_id');
			$table->dropForeign('FK_schedule_vehicle_id');
		});
	}

}
