<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip', function(Blueprint $table)
		{
			$table->foreign('driver_id', 'FK_trip_driver_id')->references('id')->on('driver')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('shift_id', 'FK_trip_shift_id')->references('id')->on('shift')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trailer_id', 'FK_trip_trailer_id')->references('id')->on('trailer')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('state', 'FK_trip_trip_state_name')->references('name')->on('trip_state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_trip_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_driver_id');
			$table->dropForeign('FK_trip_shift_id');
			$table->dropForeign('FK_trip_trailer_id');
			$table->dropForeign('FK_trip_trip_state_name');
			$table->dropForeign('FK_trip_vehicle_id');
		});
	}

}
