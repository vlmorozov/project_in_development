<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVehiclePermitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vehicle_permit', function(Blueprint $table)
		{
			$table->foreign('permit_type_id', 'FK_vehicle_permit_permit_type_id')->references('id')->on('permit_type')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('vehicle_id', 'FK_vehicle_permit_vehicle_id')->references('id')->on('vehicle')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vehicle_permit', function(Blueprint $table)
		{
			$table->dropForeign('FK_vehicle_permit_permit_type_id');
			$table->dropForeign('FK_vehicle_permit_vehicle_id');
		});
	}

}
