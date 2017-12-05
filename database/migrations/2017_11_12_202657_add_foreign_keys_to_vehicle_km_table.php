<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehicleKmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_km', function(Blueprint $table)
		{
			$table->foreign('foto_file_id', 'FK_vehicle_km_foro_file_id')->references('id')->on('uploaded_files')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('trip_point_id', 'FK_vehicle_km_trip_point_id')->references('id')->on('trip_point')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('create_user_id', 'FK_vehicle_km_user_id')->references('id')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_km_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_km', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_km_foro_file_id');
			$table->dropForeign('FK_vehicle_km_trip_point_id');
			$table->dropForeign('FK_vehicle_km_user_id');
			$table->dropForeign('FK_vehicle_km_vehicle_id');
		});
	}

}
