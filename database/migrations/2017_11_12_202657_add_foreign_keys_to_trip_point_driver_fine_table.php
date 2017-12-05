<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTripPointDriverFineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('trip_point_driver_fine', function(Blueprint $table)
		{
			$table->foreign('driver_fine_id', 'FK_trip_point_driver_fine_driver_fine_id')->references('id')->on('driver_fine')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('driver_payment_id', 'FK_trip_point_driver_fine_driver_payment_id')->references('id')->on('driver_payment')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_point_id', 'FK_trip_point_driver_fine_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('trip_point_driver_fine', function(Blueprint $table)
		{
			$table->dropForeign('FK_trip_point_driver_fine_driver_fine_id');
			$table->dropForeign('FK_trip_point_driver_fine_driver_payment_id');
			$table->dropForeign('FK_trip_point_driver_fine_trip_point_id');
		});
	}

}
