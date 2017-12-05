<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDriverPaymentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('driver_payment', function(Blueprint $table)
		{
			$table->foreign('create_user_id', 'FK_driver_payment_create_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_id', 'FK_driver_payment_trip_id')->references('id')->on('trip')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_point_id', 'FK_driver_payment_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'FK_driver_payment_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_repair_id', 'FK_driver_payment_vehicle_repair_id')->references('id')->on('vehicle_repair')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('driver_payment', function(Blueprint $table)
		{
			$table->dropForeign('FK_driver_payment_create_user_id');
			$table->dropForeign('FK_driver_payment_trip_id');
			$table->dropForeign('FK_driver_payment_trip_point_id');
			$table->dropForeign('FK_driver_payment_user_id');
			$table->dropForeign('FK_driver_payment_vehicle_repair_id');
		});
	}

}
